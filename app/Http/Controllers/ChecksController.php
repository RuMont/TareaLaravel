<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checks;
use Illuminate\Support\Facades\Auth;

class ChecksController extends Controller
{
    protected $checksModel;

    public function __construct(Checks $checks){
        $this->checksModel = $checks;
    }
    public function index()
    {
        $checks = $this->checksModel->obtenerChecks();
        foreach ($checks as $check) {
            $check->entry_time = date('Y-m-d H:i', strtotime($check->entry_time));
            $check->exit_time = date('Y-m-d H:i', strtotime($check->exit_time));
        }
        
        return view('readtable', ['checks' => $checks]);
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
                "centre" => 'centre is null/not valid'
            ]);
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
                "exit_time" => "Exit time cannot be inferior to Entry time"
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
