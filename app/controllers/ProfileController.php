<?php

class ProfileController extends BaseController {

    // Load my profile
    public function getIndex() {
        //// All user using eloquent
        //$friends = Usuarios::all();
        // All users except current user using eloquent
        $friends = Usuarios::where('id', '<>', Auth::user()->id)->get();
        //// All users except current user using query builder
        //$friends = DB::table('usuarios')
        //        ->where('id', '<>', Auth::user()->id)
        //        ->get();
        // Comentarios por id
        $publicaciones = Usuarios::find(Auth::user()->id)->myComments();
        $listOfFriends = Usuarios::find(Auth::user()->id)->myFriends();
        // Hace la cadena de caracteres para el data-source
        $s = "";
        foreach ($listOfFriends as $friend) {
            $s.=",\"{$friend->nombre}\"";
        }
        $s = trim($s, ',');
        $s = "[$s]";
        return View::make('perfil.perfil')
                        ->with('nombre', Auth::user()->nombre)
                        ->with('pic', Auth::user()->id . ".jpg")
                        ->with('publicaciones', $publicaciones)
                        ->with('friends', $s)
                        ->with('amigos', $listOfFriends)
                        ->with('uobj', Auth::user());
    }

    // Load other profile
    public function getView($id) {
        if ($id == Auth::user()->id) {
            return Redirect::to("/profile");
        }

        $usuario = Usuarios::find($id);
        if ($usuario) {
            $publicaciones = $usuario->myComments();
            $listOfFriends = $usuario->myFriends();
            // Hace la cadena de caracteres para el data-source
            $s = "";
            foreach ($listOfFriends as $friend) {
                $s.=",\"{$friend->nombre}\"";
            }
            $s = trim($s, ',');
            $s = "[$s]";
            return View::make('perfil.perfil')
                            ->with('nombre', $usuario->nombre)
                            ->with('pic', $usuario->id . ".jpg")
                            ->with('publicaciones', $publicaciones)
                            ->with('friends', $s)
                            ->with('amigos', $listOfFriends)
                            ->with('uobj', $usuario);
        } else {
            return Redirect::to("/profile");
        }
    }

    // Logout
    public function getLogout() {
        Auth::logout();
        return Redirect::to("/");
    }

    // Funcion para cuando 
    public function missingMethod($parameters = array()) {
        return Redirect::to('/');
    }

}
