<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Users extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

    // Definimos las variables
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = ['email', 'dni', 'password', 'is_admin'];

    // Obtener todos los centros
    public function obtenerUsuarios()
    {
        return Users::all();
    }

    // Obtenemos el usuarios por id
    public function obtenerUsuarioPorCodigo($primaryKey)
    {
        return Users::find($primaryKey);
    }
}
