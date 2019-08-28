@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tema : {{$oferta->tema}}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cupos : <small>{{$oferta->cupos}}</small></li>
                    <li class="list-group-item">Lugar : <small>{{$oferta->lugar}}</small></li>
                    <li class="list-group-item">Registrado en : <small>{{$oferta->created_at}}</small> </li>
                </ul>

            </div>
        </div>
            <div class="row col-md-12 m-3">
                <div class="col-md-12">
                    <h3 class="font weight-bold "> Empresarios Asistentes </h3>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegistrarAsistententesOferta">
                        Registrar Asistentes
                    </button>
                </div>
            </div>
        <table class="table table-hover ">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Documento</th>
                <th scope="col">Fundacion</th>
            </tr>
            @foreach( ($oferta->empresarios) as $key => $empresario)
            <tr>

                <td scope="row">
                    <p><small>{{$key+1}} </small></p>
                </td>
                <td scope="row">
                    <p><small> {{$empresario->nombre}}</small></p>
                </td>
                <td>
                    <p><small>{{$empresario->documento}} </small></p>
                </td>
                <td>
                    <p><small> {{$empresario->fundacion}}</small></p>
                </td>
            </tr>
            @endforeach
            <tbody>
        </table>
    </div>

    @include('oferta.addEmpresarios')
</div>

@endsection