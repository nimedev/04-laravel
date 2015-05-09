<?php

class publicacionController extends BaseController {

    public function postCrear() {
        $publicacion = [
            'publicacion' => Input::get('publicacion'),
            'tipo' => '0',
            'usuario' => Auth::user()->id,
            'receptor' => Input::get('receptor')
        ];
        DB::table('publicaciones')->insert($publicacion);
        Session::flash("mensaje", 'Se ha creado una nueva publicacion');
        return Redirect::to('profile/view/'.$publicacion['receptor']);
    }

    public function postComentar() {
        
    }
    
    public function postMeGusta() {
        $publicacion = Input::get('publicacion');
        $megusta = [
            'usuario' => Auth::user()->id,
            'publicacion' => $publicacion
        ];
        DB::table('me_gusta')->insert($megusta);
        $data['nlikes'] = MeGusta::likes($publicacion);
        
        return Response::json($data);
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
