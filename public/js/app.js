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

$(function () {
    var capaUrl = window.location.origin;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('.table-empresarios').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: capaUrl + '/empresarios',
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'fundacion',
                name: 'fundacion'
            },
            {
                data: 'nombre',
                name: 'nombre'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'contacto',
                name: 'contacto'
            },
            {
                data: 'direccion',
                name: 'direccion'
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

    $('#btnCreateEmpresario').click(function () {
        $('#formCreateEmpresario').trigger('reset');
        $('#createEmpresario').modal('show');
    });

    //Mostrar modal de edicion

    $('body').on('click', '.editEmpresario', function () {
        $.get(capaUrl + '/empresarios/' + $(this).data('id') + '/edit',
            function (data) {
                $('#updateBtnEmpresario').html('Save Changes');
                $('#formUpdateEmpresario').trigger("reset");
                $('#idEmpresario').val(data.id),
                $('#fundacion').val(data.fundacion),
                $('#nombre').val(data.nombre),
                $('#email').val(data.email),
                $('#documento').val(data.documento),
                $('#numero_documento').val(data.numero_documento),
                $('#contacto').val(data.contacto),
                $('#direccion').val(data.direccion),
                $('#barrio').val(data.barrio),
                $('#comuna').val(data.comuna),
                $('#formUpdateEmpresario').modal('show');
                $('#updateEmpresario').modal('show');
            })
    });

    //Enviando datos de registro

    $('#saveBtnEmpresario').click(function (e) {
        e.preventDefault();
        $(this).html('Sending...');
        $.ajax({
            data: $('#formCreateEmpresario').serialize(),
            url: $('#formCreateEmpresario').attr('action'),
            type: "POST",
            //   dataType: 'json',
            success: function (data) {
                toastr.info(data, 'Forcap dice ...')
                $('#formCreateEmpresario').trigger("reset");
                $(".modal-backdrop").remove();
                $('#createEmpresario').modal('hide');
                table.draw();
            },
            error: function (data) {
                toastr.error(data, 'Forcap dice ...')
                $('#saveBtnEmpresario').html('Save Changes');
            }
        });
    });

    //Enviando datos de registro para actualizar

    $('#updateBtnEmpresario').click(function (e) {
        e.preventDefault();
        $(this).html('Sending...');
        $.ajax({
            data: $('#formUpdateEmpresario').serialize(),
            url: capaUrl + '/empresarios/' + $('#idEmpresario').val(),
            type: "PATCH",
            //   dataType: 'json',
            success: function (data) {
                toastr.info(data, 'Forcap dice ...')
                $('#formUpdateEmpresario').trigger("reset");
                $(".modal-backdrop").remove();
                $('#updateEmpresario').modal('hide');
                table.draw();
            },
            error: function (data) {
                toastr.error('Ha ocurrido un error !', 'Forcap dice ...')
                $('#updateBtnEmpresario').html('Save Changes');
            }
        });
    });


    //Eliminando registro

    $('body').on('click', '.deleteEmpresario', function () {

        if (confirm("Desea eliminar?!")) {
            $.ajax({
                type: "DELETE",
                url: capaUrl + '/empresarios/' + $(this).data("id"),
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

    $('body').on('click', '.showEmpresario', function () {
        window.location.href = capaUrl + "/empresarios/" + $(this).data("id");
    });

});

$(function () {

    var capaUrl = window.location.origin;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('.table-unidades').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: capaUrl + '/unidades/search/'+ $('#searchDocumento').text(),
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nombre',
                name: 'nombre'
            },
            {
                data: 'tipo',
                name: 'tipo'
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

    $('#btnCreateUnidad').click(function () {
        $('#formCreateUnidad').trigger('reset');
        $('#createUnidad').modal('show');
    });

    //Mostrar modal de edicion

    $('body').on('click', '.editUnidad', function () {
        $.get(capaUrl + '/unidades/' + $(this).data('id') + '/edit',
            function (data) {
                $('#updateBtnUnidad').html('Save Changes');
                $('#formUpdateUnidad').trigger("reset");
                $('#idUnidad').val(data.id),
                    $('#nombre').val(data.nombre),
                    $('#tipo').val(data.tipo),
                    $('#formUpdateUnidad').modal('show');
                $('#updateUnidad').modal('show');
            })
    });

    //Enviando datos de registro

    $('#saveBtnUnidad').click(function (e) {
        e.preventDefault();
        $(this).html('Sending...');
        $.ajax({
            data: $('#formCreateUnidad').serialize(),
            url: $('#formCreateUnidad').attr('action'),
            type: "POST",
            //   dataType: 'json',
            success: function (data) {
                toastr.info(data, 'Forcap dice ...')
                $('#formCreateUnidad').trigger("reset");
                $(".modal-backdrop").remove();
                $('#createUnidad').modal('hide');
                $(this).html('Save Changes');
                table.draw();
            },
            error: function (data) {
                toastr.error(data, 'Forcap dice ...')
                $('#saveBtnUnidad').html('Save Changes');
            }
        });
    });

    //Enviando datos de registro para actualizar

    $('#updateBtnUnidad').click(function (e) {
        e.preventDefault();
        $(this).html('Sending...');
        $.ajax({
            data: $('#formUpdateUnidad').serialize(),
            url: capaUrl + '/unidades/' + $('#idUnidad').val(),
            type: "PATCH",
            //   dataType: 'json',
            success: function (data) {
                toastr.info(data, 'Forcap dice ...')
                $('#formUpdateUnidad').trigger("reset");
                $(".modal-backdrop").remove();
                $('#updateUnidad').modal('hide');
                table.draw();
            },
            error: function (data) {
                toastr.error('Ha ocurrido un error !', 'Forcap dice ...')
                $('#updateBtnUnidad').html('Save Changes');
            }
        });
    });


    //Eliminando registro

    $('body').on('click', '.deleteUnidad', function () {

        if (confirm("Desea eliminar?!")) {
            $.ajax({
                type: "DELETE",
                url: capaUrl + '/unidades/' + $(this).data("id"),
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

    // $('body').on('click', '.showUnidad', function () {
    //     window.location.href = capaUrl + "/unidades/" + $(this).data("id");
    // });

});
