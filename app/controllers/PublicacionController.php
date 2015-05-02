<?php

class publicacionController extends BaseController {

    public function postCrear() {
        $publicacion = [
            'publicacion' => Input::get('publicacion'),
            'tipo' => '0',
            'usuario' => Auth::user()->id
        ];
        DB::table('publicaciones')->insert($publicacion);
        Session::flash("mensaje", 'Se ha creado una nueva publicacion');
        return Redirect::to('profile');
    }

    public function postComentar() {
        
    }

    public function getEliminar($id) {
        $publicacion = Publicaciones::find($id);
        if ($publicacion && $publicacion->usuario == Auth::user()->id) {
            $publicacion->delete();
            Session::flash("mensaje", 'Se ha eliminado correctamente');
        }
        return Redirect::to('profile');
    }

}
