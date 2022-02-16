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
    public function update($id)
    {
        $checks = Checks::find($id);
        date_default_timezone_set('Europe/Madrid');
        $checks->update(["updated_at" => date("Y-m-d H:i:s")]);
        $checks->save();
        // TODO Cambiar ruta
        return redirect("/checks");
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
