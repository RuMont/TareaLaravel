<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCentresController extends Controller
{
    protected $centroModel;

    public function __construct(Centro $centro)
    {
        $this->centroModel = $centro;
    }

    // Devuelve la tabla centres de la base de datos

    public function index()
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }
        
        $centres = $this->centroModel->obtenerCentros();

        // Retorna a la vista edittable con params
        return view('admin_centres', [
            "centros" => $centres
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Inserta nuevo centro en la db centres
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }
        $centro = new Centro($request->all());
        $centro->save();
        return redirect()->route('admin_centres');
    }

    /**
     * Lleva al formulario de actualización
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        $selectedCentro = $this->centroModel->obtenerCentroPorCodigo($id);
        // TODO Cambiar ruta
        return view('admin_centres_edit', ['centro' => $selectedCentro]);
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
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        $centro = Centro::find($id);
        $centro->update(["city" => $request->city, "name" => $request->name]);
        $centro->save();
        return redirect()->route("admin_centres");
    }

    /**
     * Borra el elemento con id pasada por parámetro via ruta GET
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        Centro::destroy($id);
        return redirect()->route("admin_centres");
    }
}
