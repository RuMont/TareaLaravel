<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centro;
use App\Models\Checks;

class CentroController extends Controller
{
    protected $centroModel;

    public function __construct(Centro $centro, Checks $checks){
        $this->checksModel = $checks;
        $this->centroModel = $centro;
    }

    // Devuelve la tabla centres de la base de datos

    public function index()
    {
        $centros = $this->centroModel->obtenerCentros();
        $checks = $this->checksModel->obtenerChecks();
        
        $bool = false;
        $current_centro = 0;
        $current_entry_exit = 0;

        foreach ($checks as $bdcheck) {
            if ($bdcheck->entry_time == $bdcheck->exit_time) {
                $bool = true;
                $current_centro = $this->centroModel->obtenerCentroPorCodigo($bdcheck->centres_id);
                $current_entry_exit = $bdcheck->entry_time;
            }
        }
        // dd($current_entry_exit);
        // Retorna a la vista edittable con params
        return view('edittable', [
         'centros' => $centros,
         'bool' => $bool,
         'current_centro' => $current_centro,
         'current_entry_exit' => $current_entry_exit
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
