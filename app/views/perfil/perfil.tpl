{capture assign="left"}
    {Auth::check()}
    <center><img src="http://www.sporthotel-kuehtai.com/uploads/pics/mountainbike_sonnenuntergan_57.jpg"
         width="250" height="167"/></center>
    <div class="well">
        Información
    </div>
{/capture}
{capture assign="right"}
    <textarea placeholder="¿Qué estas pensando?" rows="3" class="col-sm-12"></textarea>
    <button class="btn pull-right btn-success">Publicar</button>
{/capture}
{capture assign="portada"}
    <img src="http://www.lirent.net/wp-content/uploads/2014/10/Android-Lollipop-wallpapers-5.jpg"/>
{/capture}    

{*layout es una variable*}
{include file="../masterpage/template.tpl" layout="two_columns"}