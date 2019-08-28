<?php

namespace App\Http\Controllers;

use App\Capacitador;
use Illuminate\Http\Request;

class CapacitadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Capacitador  $capacitador
     * @return \Illuminate\Http\Response
     */
    public function show(Capacitador $capacitador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Capacitador  $capacitador
     * @return \Illuminate\Http\Response
     */
    public function edit(Capacitador $capacitador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Capacitador  $capacitador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capacitador $capacitador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Capacitador  $capacitador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capacitador $capacitador)
    {
        //
    }
}
