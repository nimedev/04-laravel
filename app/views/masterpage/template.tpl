<html>
    <head>
        <title>Facebook</title>
        <!-- jquery -->
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        {HTML::script('assets/js/app.js')}
        {*<script>
            $(document).ready(function () {
                $("#cm").click(function () {
                    
                });
            });
        </script>*}
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <!-- fuente de google -->
        <link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
            {capture assign="layouts"}../layouts/{$layout}.tpl{/capture}
            {include file=$layouts}
        </div>
    </body>
</html>
