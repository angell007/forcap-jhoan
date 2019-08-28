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
