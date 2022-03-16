<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use App\Models\Maestro;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /* $materias = DB::table('materias')->get();*/
        
        /* return DB::table('materias')
        ->join ('maestros', 'materias.maestro_id', '=', 'maestros.id')
        ->select('materias.nombre as MatNombre','materias.semestre','materias.creditos',
        'materias.maestro_id','maestros.id as MaesId','maestros.nombre as MaesNombre')
        ->get(); */


        /* return (compact("mat"));  */
        //return DB::table('materias')->get();
        
        /* return DB::table('materias')
        ->join ('maestros', 'materias.maestro_id', '=', 'maestros.id')
        ->select('materias.nombre as MatNombre','materias.semestre','materias.creditos',
        'materias.maestro_id','maestros.id as MaesId','maestros.nombre as MaesNombre')
        ->get(); */
        

        /* return DB::table('materias')
        ->join ('maestros', 'materias.maestro_id', '=', 'maestros.id')
        ->select('materias.nombre as MatNombre','materias.semestre','materias.creditos',
        'materias.maestro_id','maestros.id as MaesId','maestros.nombre as MaesNombre')
        ->where('materias.maestro_id','=',compact('id'))
        ->get(); */
        //return (compact('id'));



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $materia = Materia::create($request->all());

        $materia->save();
        
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        return $materia;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        $materia->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        //
    }
}
