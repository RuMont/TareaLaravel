<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $userModel;

    public function __construct(Users $user){
        $this->userModel = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userModel->obtenerUsuarios();
        return view('usuarios.lista', ['usuarios' => $users]);
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
        $user = new Users($request->all());
        $user->save();
        return redirect()->action([UsersController::class, 'index']);
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
        $selectedUser = $this->userModel->obtenerUsuarioPorCodigo($id);
        return view('usuarios.update', ['usuario' => $selectedUser]);
   
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
        
        $user = Users::find($id);
        $user->update(["dni" => $request->dni, "name" => $request->name, "surname" => $request->surname, "birth_date" => $request->birth_date, "centre_id" => $request->centre_id ]);
        $user->save();
        return redirect("/usuarios");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::destroy($id);
        return redirect("/usuarios");
    }
}