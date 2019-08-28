 <!-- Modal Create -->
 <form id="formCreateEmpresario" action="{{route('empresarios.store')}}">
   <div class="modal fade" id="createEmpresario" tabindex="-1" role="dialog" aria-labelledby aria-hidden="true">

    

     <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title font-weight-bold text">Registrar Empresario</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body row">

           <div class="form-group col-md-12">
             <label for="nombre">Nombre</label>
             <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre..." />
           </div>

           <div class="form-group col-md-6">
             <label for="email">Email</label>
             <input type="email" class="form-control" id="email" name="email" placeholder="email..." />
           </div>

           <div class="form-group col-md-6">
             <label for="fundacion">Fundacion</label>
             <input type="text" class="form-control" id="fundacion" name="fundacion" placeholder="fundacion..." />
           </div>

           <div class="form-group col-md-6">
             <label for="documento">Tipo de documento</label>
             <select class="form-control" name="documento" id="documento">
               <option value="CC">CC</option>
               <option value="Nit">NIT</option>
               <option value="Otro">OTRO</option>
             </select>
           </div>


           <div class="form-group col-md-6">
             <label for="numero_documento">Numero de ID</label>
             <input type="number" min="0" class="form-control" id="numero_documento" name="numero_documento" />
           </div>

           <div class="form-group col-md-6">
             <label for="contacto">Numero de contacto</label>
             <input type="text" class="form-control" id="contacto" name="contacto" placeholder="contacto..." />
           </div>

           <div class="form-group col-md-6">
             <label for="direccion">Direccion</label>
             <input type="text" class="form-control" id="direccion" name="direccion" />
           </div>

           <div class="form-group col-md-6">
             <label for="barrio">Barrio</label>
             <input type="text" class="form-control" id="barrio" name="barrio" />
           </div>

           <div class="form-group col-md-6">
             <label for="comuna">Comuna</label>
             <input type="text" class="form-control" id="comuna" name="comuna" />
           </div>


         </div>

         <div class="modal-footer">
           <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-success btn-sm" id="saveBtnEmpresario">Save changes</button>
         </div>
       </div>
     </div>
   </div>
 </form>