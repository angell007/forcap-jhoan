 <!-- Modal Create -->
 <form id="formUpdateCapa">
     <div class="modal fade" id="updateCapa" tabindex="-1" role="dialog" aria-labelledby aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title font-weight-bold text">Actualizar Informacion</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body row">
                     <div class="form-group col-md-6">
                         <label for="tema">Tema</label>
                         <input type="text" class="form-control" id="tema" name="tema" placeholder="Tema..." />
                     </div>

                     <div class="form-group col-md-6">
                         <label for="lugar">Lugar</label>
                         <input type="text" class="form-control" id="lugar" name="lugar" placeholder="Lugar..." />
                     </div>

                     <div class="form-group col-md-6">
                         <label for="cupos">Cupos disponibles</label>
                         <input type="number" min="0" class="form-control" id="cupos" name="cupos" />
                     </div>

                     <div class="form-group col-md-6">
                         <label for="fecha_inicio">Fecha inicio</label>
                         <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" />
                     </div>

                     <div class="form-group col-md-6">
                         <label for="fecha_final">Fecha de culminacion</label>
                         <input type="date" class="form-control" id="fecha_final" name="fecha_final" />
                     </div>

                     <div class="form-group col-md-6">
                         <label for="capacitador_id">capacitador</label>
                         <select class="form-control" id="capacitador_id" name="capacitador_id">
                             <option value="3">3</option>
                             <option value="2">2</option>
                         </select>
                     </div>

                     <input type="hidden" name="id" id="id">

                 </div>

                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-success btn-sm" id="updateBtn">Save updates</button>
                 </div>
             </div>
         </div>
     </div>
 </form>