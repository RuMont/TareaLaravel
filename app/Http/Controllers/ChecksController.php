<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;
use App\Models\Checks;

class ChecksController extends Controller
{
    protected $checksModel;

    public function __construct(Checks $checks){
        $this->checksModel = $checks;
    }
    public function index()
    {
        $checks = $this->checksModel->obtenerChecks();
        return view('checks.lista', ['checks' => $checks]);
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
        $checks->save();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedCheck = $this->checksModel->obtenerChecksPorCodigo($id);
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
        $checks = Centro::find($id);
        $checks->update(["user_id" => $request->foreignId('user_id')]);
        $checks->save();
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
        return redirect("/checks");
    }
}
