<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;
use App\Models\Checks;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class ChecksController extends Controller
{
    protected $checksModel;
    protected $usersModel;
    protected $centrosModel;

    public function __construct(Checks $checks, Users $users, Centro $centros){
        $this->checksModel = $checks;
        $this->usersModel = $users;
        $this->centrosModel = $centros;
    }

    public function index()
    {
        $users = $this->usersModel->obtenerUsuarios();
        $checks = $this->checksModel->obtenerChecks();
        $centres = $this->centrosModel->obtenerCentros();

        $newObjectArray = [];

        $current_user = $this->usersModel->obtenerUsuarioPorCodigo(Auth::user());

        if ($current_user[0]->is_admin == 0) {
            // Cambia el $checks que se envía, falta función en modelo
            $checks = $this->checksModel->obtenerChecksPorUsuario(Auth::user()->id);

            // También hay que cambiar los placeholders de email, dni y centre
        }
        foreach ($checks as $check) {
            $newObject = $check;
            $newObject->user_email = $this->usersModel->obtenerUsuarioPorCodigo($check->user_id)->email;
            $newObject->user_dni = $this->usersModel->obtenerUsuarioPorCodigo($check->user_id)->dni;
            $newObject->entry_time = date('Y-m-d H:i', strtotime($check->entry_time));
            $newObject->exit_time = date('Y-m-d H:i', strtotime($check->exit_time));
            $newObject->centre_name = $this->centrosModel->obtenerCentroPorCodigo($check->centres_id)->name;
            array_push($newObjectArray, $newObject);
        }  
        
        // dd($newObjectArray);

        return view('readtable', ['checks' => $checks, 'users' => $users, 'centres' => $centres, 'newObject' => $newObjectArray]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checks = new Checks($request->all());
        $checks->user_id = Auth::id();
        $checks->entry_time = date('Y-m-d H:i:s', strtotime($checks->entry_time));
        $checks->exit_time = date('Y-m-d H:i:s', strtotime($checks->exit_time));
        if ($checks->centres_id == "null") {
            return back()->withErrors([
                "centre" => 'The selected centre is not valid'
            ]);
        }
        if ($checks->entry_time > $checks->exit_time) {
            return back()->withErrors([
                "check" => 'Entry time value cannot be higher than current time'
            ]);
        }
        if ($checks->entry_time < $checks->exit_time) {
            $checks->exit_time = $checks->entry_time;
        }
        $checks->centres_id = (int)$checks->centres_id;
        $checks->save();
        return redirect()->route('readtable');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedCheck = $this->checksModel->obtenerChecksPorCodigo($id);
        // TODO Cambiar ruta
        return view('checks.update', ['checks' => $selectedCheck]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check = $this->checksModel->obtenerChecksPorCodigo($id);
        // Comparamos el string de salida que viene por parámetro con el de
        // entrada la base de datos (formateado), si es menor, da error
        if ($request->exit_time < date('H:i', strtotime($check->entry_time))) {
            return back()->withErrors([
                "exit_time" => "Exit time value cannot be lower to entry time"
            ]);
        }
        date_default_timezone_set('Europe/Madrid');
        $check->update(["exit_time" => date("Y-m-d H:i", strtotime($request->exit_time))]);
        $check->save();
        return redirect("/readtable");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Checks::destroy($id);
        // TODO Cambiar ruta
        return redirect("/checks");
    }
}
