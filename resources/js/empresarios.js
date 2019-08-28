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
