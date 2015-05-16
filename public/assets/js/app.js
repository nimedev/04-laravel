var c = {
    comentar: function (id) {
        var group = $("#comentario-grp-" + id);
        group.fadeToggle();
    }
};

var fb = {
    comentar: function (id) {
        var comentario = $("#comentario-" + id);
        if (comentario.val()) {
            $.ajax({
                url: baseUrl + '/publicacion/comentar',
                type: 'POST',
                async: true,
                data: {
                    comentario: comentario.val(),
                    padre: id
                },
                success: function (response) {
                    var img = "<img src='"+baseUrl+"/assets/img/profile/"+response.usuario+".jpg'"
                             +" class='img-responsive'/> ";
                     console.log(img);
                    $("#comentarios-"+id).append("<div class='well'>"+img+response.comment+"</div>");
                    comentario.val("");
                }
//              ,  error: muestraError
            });
        } else {
            alert("Este campo es obligatorio!");
        }
    },
    meGusta: function (id) {
        $.ajax({
            url: baseUrl + '/publicacion/me-gusta',
            type: 'POST',
            async: true,
            data: {
                publicacion: id
            },
            success: function (response) {
                var likes = $("#likes-" + id),
                        like = $("#like-text-" + id);
                likes.text(response.nlikes);
                like.text(response.like?"Me Gusta" : "Ya NO me Gusta");
            }
//              ,  error: muestraError
        });
    }
};