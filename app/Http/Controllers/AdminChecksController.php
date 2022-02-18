<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Checks;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminChecksController extends Controller
{
    protected $checksModel;
    protected $usersModel;
    protected $centrosModel;

    public function __construct(Checks $checks, Users $users, Centro $centros)
    {
        $this->checksModel = $checks;
        $this->usersModel = $users;
        $this->centrosModel = $centros;
    }

    public function index()
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }
        $users = $this->usersModel->obtenerUsuarios();
        $checks = $this->checksModel->obtenerChecks();
        $centres = $this->centrosModel->obtenerCentros();

        $newObjectArray = [];

        foreach ($checks as $check) {
            $newObject = $check;
            $newObject->user_email = $this->usersModel->obtenerUsuarioPorCodigo($check->user_id)->email;
            $newObject->centre_name = $this->centrosModel->obtenerCentroPorCodigo($check->centres_id)->name;
            array_push($newObjectArray, $newObject);
        }

        return view('admin_checks', [
            'checks' => $checks,
            'users' => $users,
            'centres' => $centres,
            'rows' => $newObjectArray
        ]);
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
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        $checks = new Checks($request->all());
        if ($checks->user_id == "null") {
            return back()->withErrors([
                "user" => 'The selected user is not valid'
            ]);
        }
        $checks->entry_time = str_replace("T", " ", $checks->entry_time);
        $checks->exit_time = str_replace("T", " ", $checks->exit_time);
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
        $checks->centres_id = (int)$checks->centres_id;
        $checks->save();
        return redirect()->route('admin_checks');
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
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        $users = $this->usersModel->obtenerUsuarios();
        $checks = $this->checksModel->obtenerChecks();
        $centres = $this->centrosModel->obtenerCentros();

        $selectedCheck = $this->checksModel->obtenerChecksPorCodigo($id);
        $selectedUser = $this->usersModel->obtenerUsuarioPorCodigo($selectedCheck->user_id);
        $selectedCentre = $this->centrosModel->obtenerCentroPorCodigo($selectedCheck->centres_id);
        // TODO Cambiar ruta
        return view('admin_checks_edit', [
            'selectedCheck' => $selectedCheck,
            'selectedUser' => $selectedUser,
            'selectedCentre' => $selectedCentre,
            'users' => $users,
            'checks' => $checks,
            'centres' => $centres,
        ]);
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
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        $check = $this->checksModel->obtenerChecksPorCodigo($id);
        // Comparamos el string de salida que viene por parámetro con el de
        // entrada de la base de datos (formateado), si es menor, da error
        if (str_replace("T", " ", $request->exit_time) < $check->entry_time) {
            return back()->withErrors([
                "exit_time" => "Exit time value cannot be lower to entry time"
            ]);
        // Comparamos el string de entrada que viene por parámetro con el de
        // salida de la base de datos (formateado), si es mayor, da error
        } elseif (str_replace("T", " ", $request->entry_time) > $check->exit_time) {
            return back()->withErrors([
                "exit_time" => "Exit time value cannot be lower to entry time"
            ]);
        }
        date_default_timezone_set('Europe/Madrid');
        $check->update([
            "user_id" => $request->user_id,
            "entry_time" => str_replace("T", " ", $request->entry_time),
            "exit_time" => str_replace("T", " ", $request->exit_time),
            "centres_id" => $request->centres_id
        ]);
        $check->save();
        return redirect()->route('admin_checks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        Checks::destroy($id);
        // TODO Cambiar ruta
        return redirect()->route('admin_checks');
    }
}
