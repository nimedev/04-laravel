{capture assign="left"}
    <center> 
        <img src="{url('assets/img/profile/')}/{$pic}"
             {*style="witdh: 100%; height: 160px"*}
             class="img-responsive"
             style="max-height: 200px"/>
    </center>
    <div class="well">
        {*<p>{Auth::user()->nombre}</p>
        <p>{Auth::user()->correo}</p>*}
        <p>{$uobj->nombre}</p>
        <p>{$uobj->correo}</p>
    </div>
    <hr>
    <div class="row">
        {foreach $amigos as $amigo}
            <div class="col-xs-6 col-sm-4 col-md-3">
                <a href="{url('/profile/view/')}/{$amigo->id}">
                    <img src="{url('assets/img/profile/')}/{$amigo->id}.jpg"
                         {*width="50" height="50"*}
                         class="img-responsive"
                         style="max-height: 70px"/>
                    <p>
                        {$amigo->nombre}
                    </p>
                </a>
            </div>
        {/foreach}
    </div>
{/capture}
{capture assign="right"}
    {Form::open(['url'=>'publicacion/crear'])}
    <textarea required name="publicacion" placeholder="¿Qué estas pensando?" 
              rows="3" class="col-sm-12"></textarea>
    <input type="text" name="receptor" value="{$uobj->id}" hidden="true">
    <button type="submit" class="btn pull-right btn-success">Publicar</button>
    {Form::close()}
    <hr>
    <br>
    <br>
    <br>
    {if Session::has('mensaje')}
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            {Session::get('mensaje')}
        </div>
    {/if}
    {foreach $publicaciones as $publicacion}
        <div class="well" style="margin-bottom: 5px; padding: 10px 5px; word-wrap: break-word; font-family: 'Inconsolata', sans-serif;">
            <button type="button" class="close" aria-hidden="true" 
                    style="margin-top: -10px">
                <a href="{url('publicacion/eliminar')}/{$publicacion->id}">
                    &times;
                </a>
            </button>
            <img src="{url('assets/img/profile/')}/{$publicacion->usuario}.jpg"
                 class="img-responsive"
                 style="max-height: 35px; display: inline;"/>
            {$publicacion->publicacion}
        </div>
        <div>
            <span class="glyphicon glyphicon-comment"></span> 
            <span onclick="c.comentar({$publicacion->id})">Comentar</span> |
            <span class="glyphicon glyphicon-thumbs-up"
                  onclick="fb.meGusta({$publicacion->id})"></span> Me gusta
            <span id="likes-{$publicacion->id}">{$publicacion->likes()}</span>
            <div id="comentarios-{$publicacion->id}">

            </div>
            <br>
            <div id="comentario-grp-{$publicacion->id}" style="display: none;">
                <textarea id="comentario-{$publicacion->id}" rows="1" 
                          placeholder="Escribe tu comentario..."></textarea>
                <button id="cm" class="btn btn-success btn-sm" 
                        onclick="fb.comentar({$publicacion->id});">
                    Comentar
                </button>
            </div>
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