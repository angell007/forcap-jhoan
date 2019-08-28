<?php

namespace App\Http\Controllers;

use App\Negocio;
use App\Empresario;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
            $negocios = Negocio::with("dueño")->get();
            $dueños = Empresario::all();
            // dd($negocios);
            return view('negocio.index', compact('negocios','dueños'));
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
         // dd(request()->all());
        Negocio::create(request()->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function show(Negocio $negocio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function edit(Negocio $negocio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Negocio $negocio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Negocio $negocio)
    {
        //
    }

    public function dueño($negocio)
    {
            $negocio = Negocio::with('dueño')->find($negocio);
            return view('empresario.show', compact('negocio'));
    }
}
