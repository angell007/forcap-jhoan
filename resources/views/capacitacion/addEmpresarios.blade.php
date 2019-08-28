<!-- Registrar empresarios -->
<form id="formRegistrarAsistententesCapa">
    <div class="modal fade" id="RegistrarAsistententesCapa" tabindex="-1" role="dialog" aria-labelledby aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text">Registrar Asistentes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-12">
                        <select multiple="true" class="form-control col-md-12" name="idEmpresariosCapa[]" id="idEmpresariosCapa">
                            @foreach($empresarios as $empresario )
                            <option value="{{$empresario->id}}">Nombre: <br> {{$empresario->nombre}}   <br> Documento : {{$empresario->numero_documento}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="idCapa" id="idCapa" value="{{$capa->id}}" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" id="RegistrarAsistentesCapaBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>