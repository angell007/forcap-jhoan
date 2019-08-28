<?php

namespace App\Http\Controllers;

use App\Capacitacion;
use App\Empresario;
use Illuminate\Http\Request;
use DataTables;

class CapacitacionController extends Controller
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
    public function index(Request $request)
    {

        if (\Request::ajax()) {
            $data = Capacitacion::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'capacitacion.actions')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('capacitacion.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'tema' => 'required',
            'lugar' => 'required',
            'cupos' => 'required',
        ]);
        if (\Request::ajax()) {
            try {
                Capacitacion::create($request->all());
                return $request->all();
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function show($capacitacion)
    {
        // if (\Request::ajax()) {
        $capa = Capacitacion::with('empresarios')->find($capacitacion)->first();
        $empresarios = Empresario::get();
        if ($capa) {
            return view('capacitacion.details', compact('capa', 'empresarios'));
        } else {
            return 'No se logrò actualizar ';
        }
        // }
    }

    public function edit($id)
    {
        if (\Request::ajax()) {
            $capacitacion = Capacitacion::find($id);
            if ($capacitacion) {
                return $capacitacion;
            } else {
                return 'Error no se logro encontrar ';
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $capacitacion)
    {
        if (\Request::ajax()) {
            try {
                $capa = Capacitacion::find($capacitacion);
                $capa->update($request->all());
                return 'Actualizado Correctamente';
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($capacitacion)
    {
        if (\Request::ajax()) {
            $capa = Capacitacion::find($capacitacion);
            if ($capa->delete()) {
                return 'Eliminado Correctamente';
            } else {
                return 'No se logrò eliminar ';
            }
        }
    }

    public function asistentes(Request $request)
    {

        $aux = false;
        $cont = 0;
        try {

            $capacitacion = Capacitacion::find($request->idCapa)->first();
            while ($cont < count($request->idEmpresariosCapa)) {

                $empresario = Empresario::find($request->idEmpresariosCapa[$cont]);

                foreach ($capacitacion->empresarios as $key) {
                    if ($key->pivot->empresario_id === $empresario->id) {
                        $aux = true;
                    }
                }

                if ($aux === false) {
                    $capacitacion->empresarios()->attach($empresario);
                }

                $cont = $cont + 1;
                $aux = false;
            };
            return 'Exito';
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
