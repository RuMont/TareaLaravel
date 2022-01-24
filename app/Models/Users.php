<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    //Definimos las variables

    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = ['dni', 'name', 'surname', 'birth_date','centre_id','created_at', 'updated_at'];


    // Obtener todos los centros

    public function obtenerUsuarios()
    {
        return Users::all();
    }

    
    // Obtenemos el usuarios por id

    public function obtenerUsuarioPorCodigo($primaryKey){
            return Users::find($primaryKey);
    }
}
