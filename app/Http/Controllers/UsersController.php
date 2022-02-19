<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
        // TODO Cambiar ruta
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
        $password = Hash::make($request->password);
        $user->password = $password;

        $bd_users = $this->userModel->obtenerUsuarios();
        foreach ($bd_users as $bd_user) {
            if ($user->email == $bd_user->email) {
                return back()->withErrors([
                    'email' => 'The provided email address has already been used'
                ]);
            }
        }
        $user->save();
        return redirect('/login')->with('status', 'You have just created an account');
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
        // TODO Cambiar ruta
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
        // TODO Cambiar ruta
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
        // TODO Cambiar ruta
        return redirect("/usuarios");
    }
}