<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carga_Academica extends Model
{
    use HasFactory;
    protected $table = 'carga_academica';

    protected $fillable = [
        'user_id',
        'materia_id'
    ];
}
