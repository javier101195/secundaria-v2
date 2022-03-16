<?php

namespace App\Http\Controllers;

use App\Models\Carga_Academica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Materia;
use Illuminate\Support\Arr;

class CargaAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = DB::table('users')
        ->select('users.id','users.name')
        ->get();

        $h = DB::table('carga_academica')
        ->join('users', 'carga_academica.user_id', '=', 'users.id')
        ->join('materias', 'carga_academica.materia_id', '=', 'materias.id')
        ->select('users.id as AlumnoId','users.name as NombreAlumno','materias.nombre as NombreMateria', 'materias.creditos')
        ->get();

        return view('carga_academica', compact('usuarios',"h"));

    }

    public function consul(Request $request, $id){

        $name_alu=DB::table('users')      
        ->where('users.id','=',$id)
        ->pluck('users.name'); 

        $total_mat= DB::table('carga_academica as ca')
        ->join('users as us', 'ca.user_id', '=', 'us.id')
        ->join('materias as mat', 'ca.materia_id', '=', 'mat.id')
        ->select('us.id as AlumnoId','us.name as NombreAlumno',
        'ca.user_id','ca.materia_id','mat.id as MateriaId','mat.nombre as NombreMateria', 'mat.creditos')           
        ->where('ca.user_id','=', $id)
        ->count('ca.materia_id');        

        $tot_cre=DB::table('carga_academica as ca')
        ->join('users as us', 'ca.user_id', '=', 'us.id')
        ->join('materias as mat', 'ca.materia_id', '=', 'mat.id')
        ->where('ca.user_id','=', $id)
        ->sum('mat.creditos');

        $array = ['nombre' => $name_alu, 'materias' => $total_mat, 
        'creditos' =>  $tot_cre];
 
        $datos= Arr::flatten($array);
        return ($datos);
        //dd($flattened);

    }

    public function listaMaterias (Request $request, $id){

        return DB::table('carga_academica as ca')
        ->join('materias as mat', 'ca.materia_id', '=', 'mat.id')
        ->select('ca.id as ca_id','mat.id','mat.nombre as mat_nombre','ca.materia_id','mat.creditos')
        ->where('ca.user_id','=', $id)
        ->get();
    }

    public function listaMateriasNo (Request $request, $id){

        return DB ::table('materias as mat')
        ->leftJoin('carga_academica as ca', 'mat.id', '=', 'ca.materia_id')
        ->select('mat.id','mat.nombre as mat_nombre','ca.materia_id','mat.creditos')
        ->where('ca.user_id','=', null)
        ->orwhere('ca.user_id','!=', $id)
        ->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carga = Carga_Academica::create($request->all());

        $carga->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carga_Academica  $carga_Academica
     * @return \Illuminate\Http\Response
     */
    public function show(Carga_Academica $carga_Academica)
    {
        return $carga_Academica;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carga_Academica  $carga_Academica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carga_Academica $carga_Academica)
    {
        $carga_Academica->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carga_Academica  $carga_Academica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carga_Academica $carga_Academica,$id)
    {    
        $m = Carga_Academica::find($id);
        $m->delete();
       
    }
}
