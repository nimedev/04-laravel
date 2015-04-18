$(document).ready(function () {
    $("#comentar").click(function () {
        alert("jfpo");
    });
});

var fb = {
    comentar: function (id) {
        var comentario = $("#comentario-" + id);
        if (comentario.val() != "") {
            alert(comentario.val());

            $.ajax({
                url: 'publicacion/comentar',
                type: 'POST',
                async: true,
                data: {
                    usuario : 1,
                    comentario: comentario.val()
                },
                success: function(response){
                    alert("se ejecutó correctamente");
                }
//              ,  error: muestraError
            });

        } else {
            alert("empty!");
        }
    }
}