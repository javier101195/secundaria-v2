<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materia;

class Maestro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];
    public function materia(){
        return $this->hasMany(Materia::class);
    }
}
