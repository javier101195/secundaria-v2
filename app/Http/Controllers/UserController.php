<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Carga_Academica;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      

        /* $name=DB::table('users')
        ->select('users.name')
        ->where('users.id','=', '1')
        ->pluck('users.name');

        $noMat= DB::table('carga_academica as ca')
        ->join('users as us', 'ca.user_id', '=', 'us.id')
        ->join('materias as mat', 'ca.materia_id', '=', 'mat.id')
        ->select('us.id as AlumnoId','us.name as NombreAlumno',
        'ca.user_id','ca.materia_id','mat.id as MateriaId','mat.nombre as NombreMateria', 'mat.creditos')           
        ->where('ca.user_id','=', '1')
        ->count('ca.materia_id');
        

        $total=DB::table('carga_academica as ca')
        ->join('users as us', 'ca.user_id', '=', 'us.id')
        ->join('materias as mat', 'ca.materia_id', '=', 'mat.id')
        ->where('ca.user_id','=', '1')
        ->sum('mat.creditos'); */
        /* $cargadas = DB::table('carga_academica as ca')
        ->join('materias as mat', 'ca.materia_id', '=', 'mat.id')
        ->select('mat.id','mat.nombre as mat_nombre','ca.materia_id','mat.creditos')
        ->where('ca.user_id','=', 1)
        ->get();

        $no_cargadas = DB ::table('materias as mat')
        ->leftJoin('carga_academica as ca', 'mat.id', '=', 'ca.materia_id')
        ->select('mat.id','mat.nombre as mat_nombre','ca.materia_id','mat.creditos')
        ->where('ca.user_id','=', null)
        ->orwhere('ca.user_id','!=', 1)
        ->get();
        
        return(compact('cargadas', 'no_cargadas')); */

        return DB::table('carga_academica as ca')
        ->join('materias as mat', 'ca.materia_id', '=', 'mat.id')
        ->select('ca.id as ca_id','mat.id','mat.nombre as mat_nombre','ca.materia_id','mat.creditos')
        ->where('ca.user_id','=', 1)
        ->get();

        //return $array = Arr::collapse(['name' => $name]);
        /* $array = ['cargadas' => $no_cargadas];
 
        return $flattened = Arr::flatten($array); */
        //return($cargadas);

        //dd($flattened);

        

        //return $isAccessible = Arr::accessible(['a' => 1, 'b' => 2]);
        //return ($isAccessible);

        //return (compact('name','noMat','total','cargadas'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
