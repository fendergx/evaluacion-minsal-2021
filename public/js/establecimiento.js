//Delay table load until everything else is loaded
$(window).load(function(){
    $('#postTable').removeAttr('style');
});

/* Eliminar*/
$(document).on('click', '.delete-modal', function() {
    $('#id_delete').val($(this).data('id'));

    $('#modal-eliminar-establecimiento').modal('show');
    id = $('#id_delete').val();
});

//acciónn de eliminar
$('.modal-footer').on('click', '.delete', function() {
    $.ajax({
        type: 'DELETE',
        url: 'establecimiento/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function(data) {
            toastr.success('Se ha eliminado el establecimiento', 'Éxito!', {timeOut: 5000});
            $('.itemEstablecimiento' + data['id']).remove();
            $('.col1').each(function (index) {
                $(this).html(index+1);
            });
        }
        
        //en caso de fallo al eliminar
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        toastr.error('No se puede eliminar el establecimiento, ya que tiene\ndependencias', 'Error!');
    });
});


/* agregar*/ 
$(document).on('click', '.add-modal', function() {
            // Vaciar imputs
            $('#nombre').val('');

            //mostrar modal
            $('#modal-registro-establecimiento').modal("show");
        });

/*insertar*/
$('.modal-footer').on('click', '.addEstablecimiento', function() {
    $.ajax({
        type: 'POST',
        url: 'establecimiento',
        data: {
            '_token': $('input[name=_token]').val()
            ,            'nombre': $('#nombre').val(),
        },

        success: function(data) {
            if ((data.errors)) {

                setTimeout(function () {
                    $('#modal-registro-establecimiento').modal('show');
                    toastr.error('Llene correctamente los campos!', 'Ha ocurrido un error', {timeOut: 7000});
                }, 500);
                if (data.errors.nombre) {
                    if($('#nombre').val() ==''){
                        toastr.warning('Debe ingresar el nombre del establecimiento');
                    }else{
                        toastr.warning('El establecimiento solo puede contener letras', '', {timeOut: 3000});
                    }
                }
            } else {
                toastr.success('Se ha agregado el establecimiento!', 'Éxito!', {timeOut: 2300});
                $('#postTable').append("<tr class='itemEstablecimiento" + data.id + "'><td>" + data.nombre+"<td><button class='edit-modal btn btn-info' data-id='"+data.id+"' data-establecimiento='"+data.nombre+"'><span class='fas fa-edit'></span>&nbsp;Editar</button> <button class='delete-modal btn btn-danger' data-id='"+data.id+"' data-establecimiento='"+data.nombre+"'><span class='fas fa-trash'></span>&nbsp;Eliminar</button></td>");
            }
        },
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        toastr.warning('Ya existe un establecimiento con ese nombre', 'Establecimiento no agregado!');
    });
});


// editar
$(document).on('click', '.edit-modal', function() {
    $('#id_edit').val($(this).data('id'));
    $('#establecimiento_editar').val($(this).data('establecimiento'));
    id = $('#id_edit').val();
    $('#modal-editar-establecimiento').modal('show');
});


$('.modal-footer').on('click', '.edit', function() {
    $.ajax({
        type: 'PUT',
        url: 'establecimiento/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#id_edit").val(),
            'nombre': $('#establecimiento_editar').val(),
        },
        success: function(data) {
            if ((data.errors)) {

                setTimeout(function () {
                    $('#modal-editar-establecimiento').modal('show');
                    toastr.error('Llene correctamente los campos!', 'Error', {timeOut: 7000});
                }, 500);
                if (data.errors.nombre) {
                    if($('#nombre').val() ==''){
                        toastr.warning('Debe ingresar el nombre del establecimiento');
                    }else{
                        toastr.warning('El establecimiento solo puede contener letras', '', {timeOut: 3000});
                    }
                }
                
            } else {
                toastr.success('Se ha editado el establecimiento!', 'Éxito!', {timeOut: 2000});
                $('.itemEstablecimiento' + data.id).replaceWith("<tr class='itemEstablecimiento" + data.id + "'><td>" + data.nombre+"<td><button class='edit-modal btn btn-info' data-id='"+data.id+"' data-establecimiento='"+data.nombre+"'><span class='fas fa-edit'></span>&nbsp;Editar</button> <button class='delete-modal btn btn-danger' data-id='"+data.id+"' data-establecimiento='"+data.nombre+"'><span class='fas fa-trash'></span>&nbsp;Eliminar</button></td>");
                
            }
        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        setTimeout(function () {
            $('#modal-editar-establecimiento').modal('show');}, 500);
        toastr.warning('Ya existe un establecimiento con ese nombre', 'Establecimiento no editado!');
    });
});