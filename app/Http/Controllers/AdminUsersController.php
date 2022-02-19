<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    protected $usersModel;

    public function __construct(Users $users)
    {
        $this->usersModel = $users;
    }

    public function index()
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }
        
        $users = $this->usersModel->obtenerUsuarios();

        // Retorna a la vista edittable con params
        return view('admin_users', [
            "usuarios" => $users
        ]);
    }


    public function edit($id)
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        $selectedUser = $this->usersModel->obtenerUsuarioPorCodigo($id);

        return view('admin_users_edit', ['usuario' => $selectedUser]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        $user = new Users($request->all());
        $password = Hash::make($request->password);
        $user->password = $password;

        $bd_users = $this->usersModel->obtenerUsuarios();
        foreach ($bd_users as $bd_user) {
            if ($user->email == $bd_user->email) {
                return back()->withErrors([
                    'email' => 'already exists an account with the provided email'
                ]);
            }
        }

        $user->save();
        return redirect()->route('admin_users');
    }
    public function update(Request $request, $id)
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        $user = Users::find($id);
        
        if (Hash::needsRehash($request->password)) {
            $request->password = Hash::make($request->password);
        }
        
        $user->update(["email" => $request->email, "dni" => $request->dni, "password" => $request->password]);
        $user->save();
        return redirect()->route("admin_users") ;
    }
    public function destroy($id)
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        Users::destroy($id);
        return redirect()->route("admin_users");
    }
}