{capture assign="left"}
    {Auth::check()}
    <center><img src="http://www.sporthotel-kuehtai.com/uploads/pics/mountainbike_sonnenuntergan_57.jpg"
                 width="250" height="167"/></center>
    <div class="well">
        Información
    </div>
{/capture}
{capture assign="right"}
    {Form::open(['url'=>'publicacion/crear'])}
    <textarea required name="publicacion" placeholder="¿Qué estas pensando?" rows="3" class="col-sm-12"></textarea>
    <button type="submit" class="btn pull-right btn-success">Publicar</button>
    {Form::close()}
    <hr>
    <br>
    <br>
    <br>
    {if Session::has('mensaje')}
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {Session::get('mensaje')}
        </div>
    {/if}
    {foreach $publicaciones as $publicacion}
        <div class="well" style="margin-bottom: 5px; padding: 10px 5px; word-wrap: break-word; font-family: 'Inconsolata', sans-serif;">
            <button type="button" class="close" aria-hidden="true" style="margin-top: -10px">
                <a href="{url('publicacion/eliminar')}/{$publicacion->id}">&times;</a>
            </button>
            {$publicacion->publicacion}
        </div>
        <div>
            <span class="glyphicon glyphicon-comment"></span> 
            <span id="comentar">Comentar</span> |
            <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
            <div id="comentarios-{$publicacion->id}}">
                
            </div>
            <br>
            <textarea id="comentario-{$publicacion->id}}" rows="1" placeholder="Escribe tu comentario..."></textarea>
            <button id="cm" class="btn btn-success btn-sm" onclick="fb.comentar({$publicacion->id})">Comentar</button>
        </div>
        <hr>
    {foreachelse}
        <div class="alert alert-danger">No hay publicaciones</div>
    {/foreach}
{/capture}
{capture assign="portada"}
    <img src="http://www.lirent.net/wp-content/uploads/2014/10/Android-Lollipop-wallpapers-5.jpg"/>
{/capture}    

{*layout es una variable*}
{include file="../masterpage/template.tpl" layout="two_columns"}