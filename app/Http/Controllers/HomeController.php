<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        /* $mat = DB::table('materias')
        ->join ('maestros', 'materias.maestro_id', '=', 'maestros.id')
        ->select('materias.nombre as MatNombre','materias.semestre','materias.creditos',
        'materias.maestro_id','maestros.id as MaesId','maestros.nombre as MaesNombre')
        ->get();
        return view('home', compact("mat")); */
        //$materias = DB::table('materias')->get();

        /* $maes_select = DB::table('materias')
        ->join ('maestros', 'materias.maestro_id', '=', 'maestros.id')
        ->select('materias.nombre as MatNombre','materias.semestre','materias.creditos',
        'materias.maestro_id','maestros.id as MaesId','maestros.nombre as MaesNombre')
        ->where('materias.maestro_id','=','')
        ->get(); */
        
        $mat = DB::table('materias')
        ->join ('maestros', 'materias.maestro_id', '=', 'maestros.id')
        ->select('materias.nombre as MatNombre','materias.semestre','materias.creditos',
        'materias.maestro_id','maestros.id as MaesId','maestros.nombre as MaesNombre')
        ->get();


        //return (compact("mat", 'materias'));
        return view('home',compact("mat"));
    }

    /* public function listaMaterias(Request $request){
        return DB::table('materias')
        ->join ('maestros', 'materias.maestro_id', '=', 'maestros.id')
        ->select('materias.nombre as MatNombre','materias.semestre','materias.creditos',
        'materias.maestro_id','maestros.id as MaesId','maestros.nombre as MaesNombre')
        ->where('materias.maestro_id','=','$request')
        ->get();


    } */


    public function store(Request $request)
    {
        //dd ($request->all());

        /* $maes_select = DB::table('materias')
        ->join ('maestros', 'materias.maestro_id', '=', 'maestros.id')
        ->select('materias.nombre as MatNombre','materias.semestre','materias.creditos',
        'materias.maestro_id','maestros.id as MaesId','maestros.nombre as MaesNombre')
        ->where('materias.maestro_id','=',compact('request'))
        ->get(); */

        //dd($maes_select); 
        //return (compact('maes_select'));

        
        
    }
    public function consulta(Request $request, $id)
    {
        $maes_select = DB::table('materias')
        ->join ('maestros', 'materias.maestro_id', '=', 'maestros.id')
        ->select('materias.nombre as MatNombre','materias.semestre','materias.creditos',
        'materias.maestro_id','maestros.id as MaesId','maestros.nombre as MaesNombre')
        ->where('materias.maestro_id','=',$id)
        ->get();

        return ($maes_select);



    }
}
