function flyToElement(flyer, flyingTo)
{
    var $func = $(this);
    var divider = 3;
    var flyerClone = $(flyer).clone();

    $(flyerClone).css({
    	position: 'absolute',
    	top: $(flyer).offset().top + "px",
    	left: $(flyer).offset().left + "px",
    	opacity: 1,
    	'z-index': 1000
    });

    $('body').append($(flyerClone));
    var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width()/divider)/2;
    var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height()/divider)/2;

    $(flyerClone).animate({
        opacity: 0.4,
        left: gotoX,
        top: gotoY,
        width: $(flyer).width()/divider,
        height: $(flyer).height()/divider
    }, 700,
    function () {
        $(flyingTo).fadeOut('fast', function () {
            $(flyingTo).fadeIn('fast', function () {
                $(flyerClone).fadeOut('fast', function () {
                    $(flyerClone).remove();
                });
            });
        });
    });
}



$(document).ready(function(){
    $('.add-cart').on('click',function(event){

        event.preventDefault();

        // var itemImg = $(this).parent().find('img').eq(0);
        // flyToElement($(itemImg), $('#cantidad_carro'));


        producto = $(this).data('id');
        $.ajax({
            type: 'post',
            url: _URL + 'home/agregar_producto',
            data:{producto:producto},
            success: function(res){
                $('#cantidad_carro').html(res);
                swal('Perfecto', 'Producto agregado correctamente', 'success');
            }
        });

    });


    $('.add-cart-two').on('click',function(){

        event.preventDefault();
        // var itemImg = $(this).parent().find('img').eq(0);
        // flyToElement($(itemImg), $('#cantidad_carro'));


        producto = $(this).data('id');
        $.ajax({
            type: 'post',
            url: _URL + 'home/agregar_producto',
            data:{producto:producto},
            success: function(res){
                $('#cantidad_carro').html(res);
                swal('Perfecto', 'Producto agregado correctamente', 'success');
            }
        });

    });
});