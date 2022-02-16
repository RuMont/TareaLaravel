<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centro;

class CentroController extends Controller
{
    protected $centroModel;

    public function __construct(Centro $centro){
        $this->centroModel = $centro;
    }

    // Devuelve la tabla centres de la base de datos

    public function index()
    {
        $centros = $this->centroModel->obtenerCentros();
        return view('edittable', ['centros' => $centros]);
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
     * Inserta nuevo centro en la db centres
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $centro = new Centro($request->all());
        $centro->save();
        return redirect()->action([CentroController::class, 'index']);
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
     * Lleva al formulario de actualización
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedCentro = $this->centroModel->obtenerCentroPorCodigo($id);
        // TODO Cambiar ruta
        return view('centros.update', ['centro' => $selectedCentro]);
    }

    /**
     * Actualiza valores del elemento con id pasada por parámetro via ruta POST
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $centro = Centro::find($id);
        $centro->update(["city" => $request->city, "name" => $request->name]);
        $centro->save();
        // TODO Cambiar ruta
        return redirect("/centros");
    }

    /**
     * Borra el elemento con id pasada por parámetro via ruta GET
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Centro::destroy($id);
        // TODO Cambiar ruta
        return redirect("/centros");
    }
}
