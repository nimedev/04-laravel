<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {*<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->*}
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="./assets/img/icono.png">

        <title>Facebook</title>

        {*<!-- Bootstrap core CSS -->*}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Google Font -->
        <link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
            {capture assign="layouts"}../layouts/{$layout}.tpl{/capture}
            {include file=$layouts}
        </div>

        <!-- SCRIPTS
        ================================================== -->
        {*<!-- jQuery -->*}
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        {*<!-- Bootstrap core JavaScript -->*}
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        {*<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->*}
        {*<script src="Carousel%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.js"></script>*}

        {*<!-- Custom scripts -->*}
        {HTML::script('assets/js/app.js')}
        {HTML::script('assets/libs/typeahead/bootstrap3-typeahead.min.js')}
    </body>
</html>
