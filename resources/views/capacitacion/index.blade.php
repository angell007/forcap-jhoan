@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Capacitaciones
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                        Launch demo modal
                    </button> -->
                    <a class="btn btn-success float-right" href="javascript:void(0)" id="createCapacitacion">
                        <i class="fa fa-fw fa-plus-circle"></i>
                        Nuevo
                    </a>
                </div>
                <div class="container p-2">
                <table class="table table-striped table-bordered dt-responsive nowrap table-capas" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5px">No</th>
                                <th>Tema</th>
                                <th>Lugar</th>
                                <th width="10px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    @include('capacitacion.edit')
    @include('capacitacion.create')

</div>
@endsection
@section('script')
<!-- <script src="{{ asset('/js/scripts/capas.js') }}"></script> -->
@endsection