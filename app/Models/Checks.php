<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checks extends Model
{
    use HasFactory;

    protected $table = "checks";
    protected $primaryKey = "id";
    protected $fillable = ['user_id', 'entry_time', 'exit_time', 'centres_id'];

    public function obtenerChecks(){
        return Checks::all();
    }

    public function obtenerChecksPorCodigo($primaryKey){
        return Checks::find($primaryKey);
    }

    public function obtenerChecksPorUsuario($user_id){
        return Checks::where('user_id', $user_id)->get();
    }
}
