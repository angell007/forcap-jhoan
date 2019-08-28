<?php

namespace App\Http\Controllers;

use App\Empresario;
use Illuminate\Http\Request;
use DataTables;

class EmpresarioController extends Controller
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
            $data = Empresario::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'empresario.actions')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('empresario.index');
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
                Empresario::create($request->all());
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
     * @param  \App\Empresario  $empresario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresario = Empresario::find($id);
        if ($empresario) {
            return view('empresario.details', compact('empresario'));
        } else {
            return 'No se logrò actualizar ';
        }
    }

    public function edit($id)
    {
        if (\Request::ajax()) {
            $empresario = Empresario::find($id);
            if ($empresario) {
                return $empresario;
            } else {
                return 'Error no se logro encontrar ';
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresario  $empresario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (\Request::ajax()) {
            try {
                $empresario = Empresario::find($id);
                $empresario->update($request->all());
                return 'Actualizado Correctamente';
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresario  $empresario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Request::ajax()) {
            $empresario = Empresario::find($id);
            if ($empresario->delete()) {
                return 'Eliminado Correctamente';
            } else {
                return 'No se logrò eliminar ';
            }
        }
    }
}
