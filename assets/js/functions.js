$(document).ready(function(){

    $('#region_direccion').on('change', function(){
        var region = $(this).val();
        $.ajax({
            type: 'post',
            url: URL + 'ajax/comunas_por_region',
            data: { region:region },
            success: function(resp){
                $('#comuna_direccion').empty().html(resp);
            }
        });
    });



    $('.add-to-cart').on('click', function(event){
        event.preventDefault();
        $(this).addClass('disabled-button');
        $(this).attr('disabled', true);
        $(this).text('Agregando al carro');

        var id = $(this).data('id');
        var cantidad = $('.cantidad_producto').val();

        $.ajax({
            type: 'post',
            url: URL + 'ajax/agregar_producto',
            data: { id:id, cantidad:cantidad },
            success: function(resp){
                if(resp == 0){
                    swal(
                        'Perfecto!',
                        'El producto se ha agregado a tu carro',
                        'success'
                    ).then((resp) => {
                        if(resp){
                            window.location = URL + 'web/carro';
                        } else {
                            location.reload();
                        }
                    }).catch(swal.noop);
                }
            }
        });
    });

    $('.eliminar-producto').on('click', function(event){
        event.preventDefault();
        var index = $(this).data('index');
        swal({
            title: 'Atención',
            text: 'Estás seguro de eliminar este producto?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result) {
                $.ajax({
                    type: 'post',
                    url: URL + 'ajax/eliminar_producto',
                    data: { index:index },
                    success: function(resp){
                        if(resp == 0){
                            swal(
                                'Perfecto',
                                'El producto ha sido eliminado',
                                'success'
                            ).then((resp) => {
                                if(resp){
                                    window.location = URL + 'web/carro';
                                } else {
                                    location.reload();
                                }
                            }).catch(swal.noop);
                        }
                    }
                });
            }
        }).catch(swal.noop);
    });


    $('#save-new-address').on('click', function(event){
        event.preventDefault();
        var calle = $('#nueva_direccion').val();
        var numero = $('#nuevo_numero').val();
        var region = $('#region_direccion').val();
        var comuna = $('#comuna_direccion').val();

        if(calle.trim() == '' || numero.trim() == '' || region == '' || comuna == ''){
            swal('Atención', 'Para agregar una nueva dirección debe completar todos los datos', 'warning').catch(swal.noop);
        } else {
            $.ajax({
                type: 'post',
                url: URL + 'ajax/agregar_direccion',
                data: { calle:calle, numero:numero, region:region, comuna:comuna },
                success: function(resp){
                    if(resp == 0){
                        swal(
                            'Perfecto',
                            'La dirección ha sido agregada, ya puedes escogerla para tus futuros despachos',
                            'success'
                        ).then((resp) => {
                            if(resp){
                                location.reload();
                            } else {
                                location.reload();
                            }
                        }).catch(swal.noop);
                    } else {
                        swal(
                            'Atención',
                            'No puedes agregar una dirección si no haz iniciado sesión',
                            'warning'
                        ).then((resp) => {
                        }).catch(swal.noop);
                    }
                }
            });
        }
    });




    $('.eliminar-direccion').on('click', function(event){
        event.preventDefault();
        var index = $(this).data('index');
        swal({
            title: 'Atención',
            text: 'Estás seguro de eliminar esta dirección?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result) {
                $.ajax({
                    type: 'post',
                    url: URL + 'ajax/eliminar_direccion',
                    data: { index:index },
                    success: function(resp){
                        if(resp == 0){
                            swal(
                                'Perfecto',
                                'La direccion ha sido eliminada',
                                'success'
                            ).then((resp) => {
                                if(resp){
                                    window.location = URL + 'web/direcciones';
                                } else {
                                    location.reload();
                                }
                            }).catch(swal.noop);
                        }
                    }
                });
            }
        }).catch(swal.noop);
    });

    $('#back_cuenta').on('click', function(){
        window.location = URL + 'web/cuenta';
    });


    $('.ver-detalle-historial').on('click', function(event){
        event.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: URL + 'ajax/detalle_historial',
            data: { id:id },
            success: function(resp){
                $('#contenido-modal-historial').empty().append(resp);
                $('#modal-historial-pedidos').modal('show');
            }
        });
    });

    $('.ver-tracking-historial').on('click', function(event){
        event.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: URL + 'ajax/tracking_historial',
            data: { id:id },
            success: function(resp){
                $('#contenido-modal-historial').empty().append(resp);
                $('#modal-historial-pedidos').modal('show');
            }
        });
    });

    $('input#rut').rut().on('rutInvalido', function(e) {
        $(this).val('').attr('placeholder', 'Rut inválido');
    });

});