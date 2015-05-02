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
                url: 'publicacion/comentar',
                type: 'POST',
                async: true,
                data: {
                    usuario: 1,
                    comentario: comentario.val()
                },
                success: function (response) {
                    alert("se ejecutó correctamente");
                }
//              ,  error: muestraError
            });

        } else {
            alert("empty!");
        }
    }
};