//Funcion para dar like a image y corzaon rojo
function like() {
    $('.btn-like').unbind('click').click(function() {
        var url = 'http://127.0.0.1:8000/'
        $(this).addClass('btn-dislike').removeClass('btn-like')
        $(this).attr('src', url+'img/heart-red.png')
        
        $.ajax({
            url: url + 'likes/' + $(this).data('id'),
            type: 'GET',
            success: function(res) {
                console.log(res)
            }
        });
        dislike()
    });
}

//Funcion para dar like a image y corzaon negro
function dislike() {
    $('.btn-dislike').unbind('click').click(function() {
        var url = 'http://127.0.0.1:8000/'
        $(this).addClass('btn-like').removeClass('btn-dislike');
        $(this).attr('src', url+'img/heart-black.png');
        
        $.ajax({
            url: url + 'dislikes/' + $(this).data('id'),
            type: 'GET',
            success: function(res) {
                console.log(res)
            }
        })
        like()
    });
}

//Documento jQuery
$(document).ready(function() {
    $('.btn-like').css('cursor', 'pointer')
    $('.btn-dislike').css('cursor', 'pointer');

//  Modal de eliminar comentario
    $('#close').click(function(){
        $('.modal').fadeOut();
    });

    $('#open-modal').click(function(){
        $('.modal').fadeIn();
    });
// -----------------------------

// Modal de eliminar Imagen
    $('#eliminar-imagen').click(function(){
        $('.modal-imagen').fadeIn();
    });

    $('#close-imagen-modal').click(function(){
        $('.modal-imagen').fadeOut();
    });
//------------------------------
// Modal de actualizar Imagen
    $('#actualizar-imagen').click(function(){
        $('.actualizar-modal-imagen').fadeIn();
    });

    $('#close-actualizar-imagen').click(function(){
        $('.actualizar-modal-imagen').fadeOut();
    });

    like(); //Funcion para dar like
    dislike(); //Funcion para quitar like
  
});
