<?php

namespace App\Http\Controllers;

use App\Oferta;
use App\Empresario;
use Illuminate\Http\Request;
use DataTables;

class OfertaController extends Controller
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
            $data = Oferta::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'oferta.actions')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('oferta.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate([
        //     'tema' => 'required',
        //     'lugar' => 'required',
        //     'cupos' => 'required',
        // ]);

        if (\Request::ajax()) {
            try {
                Oferta::create($request->all());
                return 'Registrado correctamente';
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        } else {
            return 'no es ajax';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oferta  $Oferta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresarios = Empresario::get();
        $oferta = Oferta::with('empresarios')->find($id);
        if ($oferta) {
            return view('oferta.details', compact('oferta','empresarios'));
        } else {
            return 'No se logrò actualizar ';
        }
    }

    public function edit($id)
    {
        if (\Request::ajax()) {
            $Oferta = Oferta::find($id);
            if ($Oferta) {
                return $Oferta;
            } else {
                return 'Error no se logro encontrar ';
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oferta  $Oferta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (\Request::ajax()) {
            try {
                $oferta = Oferta::find($id);
                $oferta->update($request->all());
                return 'Actualizado Correctamente';
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oferta  $Oferta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Request::ajax()) {
            $oferta = Oferta::find($id);
            if ($oferta->delete()) {
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

            $oferta = Oferta::find($request->idOferta)->first();
            while ($cont < count($request->idEmpresariosOferta)) {

                $empresario = Empresario::find($request->idEmpresariosOferta[$cont]);

                foreach ($oferta->empresarios as $key) {
                    if ($key->pivot->empresario_id === $empresario->id) {
                        $aux = true;
                    }
                }

                if ($aux === false) {
                    $oferta->empresarios()->attach($empresario);
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
