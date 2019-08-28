<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card p-2">
            <div class="card-header mb-2"> Unidades registradas
                <a class="btn btn-success btn-sm float-right mb-2" href="javascript:void(0)" id="btnCreateUnidad">
                    <i class="fa fa-fw fa-plus-circle"></i>
                    Registrar unidad productiva
                </a>
            </div>
            <table class="table table-striped table-bordered dt-responsive nowrap table-unidades" style="width:100%">
                <thead>
                    <tr>
                        <th width="5px">No</th>
                        <th>Nombre</th>
                        <th>Tipo de unidad</th>
                        <th width="10px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('establecimiento.edit')
@include('establecimiento.create')