<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Maestro;
use App\Models\Carga_Academica;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'semestre',
        'creditos',
        'maestro_id'
    ];
    public function carga_academica(){
        return $this->hasMany(Carga_Academica::class);
    }

    public function maestro(){
        return $this->belongsTo(Maestro::class);
    }
}
