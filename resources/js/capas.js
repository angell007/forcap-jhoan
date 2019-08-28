  $(function () {
      var capaUrl = window.location.origin;

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      var table = $('.table-capas').DataTable({
          processing: true,
          serverSide: true,
          ajax: capaUrl + '/capacitaciones',
          columns: [{
                  data: 'DT_RowIndex',
                  name: 'DT_RowIndex'
              },
              {
                  data: 'tema',
                  name: 'tema'
              },
              {
                  data: 'lugar',
                  name: 'lugar'
              },
              {
                  data: 'action',
                  name: 'action',
                  orderable: false,
                  searchable: false
              },
          ]
      });
      //Mostrar modal de creacion

      $('#createCapacitacion').click(function () {
          $('#formCreateCapa').trigger('reset');
          $('#createCapa').modal('show');
      });

      //Editando registro

      $('body').on('click', '.editCapacitacion', function () {
          $.get(capaUrl + '/capacitaciones/' + $(this).data('id') + '/edit',
              function (data) {
                  $('#updateBtn').html('Save Changes');
                  $('#formUpdateCapa').trigger("reset");
                  $('#id').val(data.id),
                      $('#tema').val(data.tema),
                      $('#lugar').val(data.lugar),
                      $('#cupos').val(data.cupos),
                      $('#capacitador_id').val(data.capacitador_id),
                      $('#fecha_inicio').val(data.fecha_inicio),
                      $('#fecha_final').val(data.fecha_final)
                  $('#formUpdateCapa').modal('show');
                  $('#updateCapa').modal('show');
              })
      });

      //Enviando datos de registro

      $('#saveBtn').click(function (e) {
          e.preventDefault();
          $(this).html('Sending...');
          $.ajax({
              data: $('#formCreateCapa').serialize(),
              url: $('#formCreateCapa').attr('action'),
              type: "POST",
              dataType: 'json',
              success: function (data) {
                  toastr.info('Buen trabajo !', 'Forcap dice ...')
                  $('#formCreateCapa').trigger("reset");
                  $(".modal-backdrop").remove();
                  $('#createCapa').modal('hide');
                  table.draw();
              },
              error: function (data) {
                  toastr.error('Ha ocurrido un error !', 'Forcap dice ...')
                  $('#saveBtn').html('Save Changes');
              }
          });
      });

      //Enviando datos de registro para actualizar

      $('#updateBtn').click(function (e) {
          e.preventDefault();
          $(this).html('Sending...');
          $.ajax({
              data: $('#formUpdateCapa').serialize(),
              url: capaUrl + '/capacitaciones/' + $('#id').val(),
              type: "PATCH",
              //   dataType: 'json',
              success: function (data) {
                  toastr.info(data, 'Forcap dice ...')
                  $('#formUpdateCapa').trigger("reset");
                  $(".modal-backdrop").remove();
                  $('#updateCapa').modal('hide');
                  table.draw();
              },
              error: function (data) {
                  toastr.error('Ha ocurrido un error !', 'Forcap dice ...')
                  $('#updateBtn').html('Save Changes');
              }
          });
      });


      //Eliminando registro

      $('body').on('click', '.deleteCapacitacion', function () {

          if (confirm("Desea eliminar?!")) {
              $.ajax({
                  type: "DELETE",
                  url: capaUrl + '/capacitaciones/' + $(this).data("id"),
                  success: function (data) {
                      toastr.info('Eliminado correctamente !', 'Forcap dice ...')
                      table.draw();
                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
              });
          }
      });

      // Accediendo a details

      $('body').on('click', '.showCapacitacion', function () {
          window.location.href = capaUrl + "/capacitaciones/" + $(this).data("id");
      });

      //Registrando asistentes
      $('#RegistrarAsistentesCapaBtn').click(function (e) {
          e.preventDefault();
          $(this).html('Sending...');
          $.ajax({
              data: $('#formRegistrarAsistententesCapa').serialize(),
              url: capaUrl + '/capacitacion/asistentes/',
              type: "Get",
              success: function (data) {
                  toastr.info(data, 'Forcap dice ...')
                  $('#formRegistrarAsistententesCapa').trigger("reset");
                  $(".modal-backdrop").remove();
                  $('#RegistrarAsistententesCapa').modal('hide');
                  //   table.draw();
                  location.reload();
              },
              error: function (data) {
                  toastr.error(data, 'Forcap dice ...')
                  $('#RegistrarAsistentesCapaBtn').html('Save Changes');
              }
          });
      });
  });
