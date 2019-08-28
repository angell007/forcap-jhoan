 <!-- Modal edit -->
 <form id="formUpdateUnidad">
     <div class="modal fade" id="updateUnidad" tabindex="-1" role="dialog" aria-labelledby aria-hidden="true">

         <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title font-weight-bold text">Registrar Unidad</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body row">

                     <div class="form-group col-md-12">
                         <label for="nombre">Nombre</label>
                         <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre..." />
                     </div>

                     <div class="form-group col-md-12">
                         <label for="tipo">Tipo de Unidad</label>
                         <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Nombre..." />
                     </div>

                     <input type="hidden" name="idUnidad" id="idUnidad">

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-success btn-sm" id="updateBtnUnidad">Save changes</button>
                 </div>
             </div>
         </div>
     </div>
 </form>