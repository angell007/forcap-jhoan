@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary mb-1 " style="max-width: 100%;">
                <div class="card-header font-weight-bold">Informacion de Empresario </div>
                <div class="card-body text-dark">
                    <ul class="list-group list-group-flush">
                        <li class="ml-3">
                            <h6 class="card-title" >Nombre : {{$empresario->nombre}}</h6>
                        </li>
                        <li class="ml-3" >Documento: <span id="searchDocumento" >{{$empresario->numero_documento}}</span> </li>
                        <li class="ml-3">Contacto: {{$empresario->contacto}}</li>
                        <li class="ml-3">Email: {{$empresario->email}}</li>
                        <li class="ml-3">Direccion:{{$empresario->direccion}} </li>
                    </ul>
                </div>
            </div>
            @include('establecimiento.index')
        </div>
    </div>
</div>

@endsection