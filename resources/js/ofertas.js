  $(function () {
      var capaUrl = window.location.origin;

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      var table = $('.table-ofertas').DataTable({
          processing: true,
          serverSide: true,
          ajax: capaUrl + '/ofertas',
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

      $('#btnCreateOferta').click(function () {
          $('#formCreateOferta').trigger('reset');
          $('#createOferta').modal('show');
      });

      //Mostrar modal de edicion

      $('body').on('click', '.editOferta', function () {
          $.get(capaUrl + '/ofertas/' + $(this).data('id') + '/edit',
              function (data) {
                  $('#updateBtnOferta').html('Save Changes');
                  $('#formUpdateOferta').trigger("reset");
                  $('#idOferta').val(data.id),
                      $('#nombre').val(data.nombre),
                      $('#tema').val(data.tema),
                      $('#lugar').val(data.lugar),
                      $('#cupos').val(data.cupos),
                      $('#fecha_inicio').val(data.fecha_inicio),
                      $('#fecha_final').val(data.fecha_final)
                  $('#formUpdateOferta').modal('show');
                  $('#updateOferta').modal('show');
              })
      });

      //Enviando datos de registro

      $('#saveBtnOferta').click(function (e) {
          e.preventDefault();
          $(this).html('Sending...');
          $.ajax({
              data: $('#formCreateOferta').serialize(),
              url: $('#formCreateOferta').attr('action'),
              type: "POST",
              //   dataType: 'json',
              success: function (data) {
                  toastr.info(data, 'Forcap dice ...')
                  $('#formCreateOferta').trigger("reset");
                  $(".modal-backdrop").remove();
                  $('#createOferta').modal('hide');
                  table.draw();
              },
              error: function (data) {
                  toastr.error(data, 'Forcap dice ...')
                  $('#saveBtnOferta').html('Save Changes');
              }
          });
      });

      //Enviando datos de registro para actualizar

      $('#updateBtnOferta').click(function (e) {
          e.preventDefault();
          $(this).html('Sending...');
          $.ajax({
              data: $('#formUpdateOferta').serialize(),
              url: capaUrl + '/ofertas/' + $('#idOferta').val(),
              type: "PATCH",
              //   dataType: 'json',
              success: function (data) {
                  toastr.info(data, 'Forcap dice ...')
                  $('#formUpdateOferta').trigger("reset");
                  $(".modal-backdrop").remove();
                  $('#updateOferta').modal('hide');
                  table.draw();
              },
              error: function (data) {
                  toastr.error('Ha ocurrido un error !', 'Forcap dice ...')
                  $('#updateBtnOferta').html('Save Changes');
              }
          });
      });


      //Eliminando registro

      $('body').on('click', '.deleteOferta', function () {

          if (confirm("Desea eliminar?!")) {
              $.ajax({
                  type: "DELETE",
                  url: capaUrl + '/ofertas/' + $(this).data("id"),
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

      $('body').on('click', '.showOferta', function () {
          window.location.href = capaUrl +"/ofertas/" + $(this).data("id");
      });

      //Registrando asistentes
      $('#RegistrarAsistentesOfertaBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending...');
        $.ajax({
            data: $('#formRegistrarAsistententesOferta').serialize(),
            url: capaUrl + '/oferta/asistentes/',
            type: "Get",
            success: function (data) {
                // toastr.info(data, 'Forcap dice ...')
                console.log(data)
                $('#formRegistrarAsistententesOferta').trigger("reset");
                $(".modal-backdrop").remove();
                $('#RegistrarAsistententesOferta').modal('hide');
                //   table.draw();
                location.reload();
            },
            error: function (data) {
                console.log(data)
                // toastr.error(data, 'Forcap dice ...')
                $('#RegistrarAsistentesOfertaBtn').html('Save Changes');
            }
        });
    });

  });
