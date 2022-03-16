<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Maestro::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maeastro = new Maestro;
        $maeastro->created($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maestro  $maestro
     * @return \Illuminate\Http\Response
     */
    public function show(Maestro $maestro)
    {
        //
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maestro  $maestro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maestro $maestro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maestro  $maestro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maestro $maestro)
    {
        //
    }
}
