<?php

class PublicacionController extends BaseController {

    public function postCrear() {
        $publicacion = [
            'publicacion' => Input::get('publicacion'),
            'tipo' => '0',
            'usuario' => Auth::user()->id,
            'receptor' => Input::get('receptor')
        ];
        DB::table('publicaciones')->insert($publicacion);
        Session::flash("mensaje", 'Se ha creado una nueva publicacion');
        return Redirect::to('profile/view/' . $publicacion['receptor']);
    }

    public function postComentar() {
        if (Request::ajax()) {
            $publicacion = Publicaciones::find(Input::get('padre'));
            $comment = [
                'publicacion' => Input::get('comentario'),
                'tipo' => '1',
                'usuario' => Auth::user()->id,
                'receptor' => $publicacion->receptor,
                'padre' => $publicacion->id
            ];
            DB::table('publicaciones')->insert($comment);
            
            $data['comment'] = Input::get('comentario');
            $data['usuario'] = Auth::user()->id;
            return Response::json($data);
        }
    }

    public function postMeGusta() {
        if (Request::ajax()) {
            $publicacion = Input::get('publicacion');
            $usuario = Usuarios::find(Auth::user()->id);
            if ($usuario->likeComment($publicacion)) {
                $usuario->dontLike($publicacion);
                $data['like'] = 1;
            } else {
                $megusta = [
                    'usuario' => Auth::user()->id,
                    'publicacion' => $publicacion
                ];
                DB::table('me_gusta')->insert($megusta);
                $data['like'] = 0;
            }
            $data['nlikes'] = MeGusta::likes($publicacion);

            return Response::json($data);
        }
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
