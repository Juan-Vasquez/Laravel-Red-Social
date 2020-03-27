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

// Funciones para Modal inicio de sesion
// function modal() {
//     $('.modal')
// }

//Documento jQuery
$(document).ready(function() {
    $('.btn-like').css('cursor', 'pointer')
    $('.btn-dislike').css('cursor', 'pointer');

    like(); //Funcion para dar like
    dislike(); //Funcion para quitar like
  
});
