<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Materia;

class Carga_Academica extends Model
{
    use HasFactory;
    protected $table = 'carga_academica';

    protected $fillable = [
        'user_id',
        'materia_id'
    ];

    public function materia(){
        return $this->hasMany(Materia::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
    
}
