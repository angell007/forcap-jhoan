<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use App\Empresario;
use Illuminate\Http\Request;
use DataTables;

class EstablecimientoController extends Controller
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
    public function index(Request $request, $documento)
    {

        if (\Request::ajax()) {
            try {
                $empresario = Empresario::where('numero_documento', $documento)->first();
                $data = Establecimiento::where('empresario_id', $empresario->id)->get();
                
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'establecimiento.actions')
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
            return view('establecimiento.index');
        }
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
                Establecimiento::create($request->all());
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
     * @param  \App\Establecimiento  $Establecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // if (\Request::ajax()) {
        //     $data = Establecimiento::latest()->get();
        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', 'establecimiento.actions')
        //         ->rawColumns(['action'])
        //         ->addIndexColumn()
        //         ->make(true);
        // }
        // return view('establecimiento.index');
    }

    public function edit($id)
    {
        if (\Request::ajax()) {
            $Establecimiento = Establecimiento::find($id);
            if ($Establecimiento) {
                return $Establecimiento;
            } else {
                return 'Error no se logro encontrar ';
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Establecimiento  $Establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (\Request::ajax()) {
            try {
                $establecimiento = Establecimiento::find($id);
                $establecimiento->update($request->all());
                return 'Actualizado Correctamente';
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Establecimiento  $Establecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Request::ajax()) {
            $establecimiento = Establecimiento::find($id);
            if ($establecimiento->delete()) {
                return 'Eliminado Correctamente';
            } else {
                return 'No se logrò eliminar ';
            }
        }
    }
}
