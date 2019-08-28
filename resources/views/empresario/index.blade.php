@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-2">
                <div class="card-header mb-2"> Empresarios
                    <a class="btn btn-success float-right" href="javascript:void(0)" id="btnCreateEmpresario">
                        <i class="fa fa-fw fa-plus-circle"></i>
                        Nuevo
                    </a>
                </div>
                <table class="table table-striped table-bordered dt-responsive nowrap table-empresarios" style="width:100%">
                    <thead>
                        <tr>
                            <th width="5px">No</th>
                            <th>Fundacion</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Contacto</th>
                            <th>Direccion</th>
                            <th width="10px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('empresario.edit')
    @include('empresario.create')

</div>
@endsection