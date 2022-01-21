<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;

    // Definimos las variables

    protected $table = "centres";
    protected $primaryKey = 'id';
    protected $fillable = ['city' , 'name'];

    
    // Obtener todos los centros

    public function obtenerCentros()
    {
        return Centro::all();
    }

    
    // Obtenemos el centro por id

    public function obtenerCentroPorCodigo($primaryKey){
            return Centro::find($primaryKey);
    }

    //Obtenemos el ccentro que contenga el texto

    public function obtenerCentrosConTexto($texto){
        
        return Centro::where('nombre','like','%' . $texto );
    }


}
