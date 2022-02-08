<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checks extends Model
{
    use HasFactory;

    protected $table = "checks";
    protected $primaryKey = "id";
    protected $fillable = ['created_at', 'updated_at', 'user_id'];

    public function obtenerChecks(){
        return Checks::all();
    }

    public function obtenerChecksPorCodigo($primaryKey){
        return Checks::find($primaryKey);
}
}
