<?php

class Usuarios extends Eloquent {

    protected $table = 'usuarios';

    public function myComments() {
        return $publicaciones = Publicaciones::where('receptor', $this->id)
                ->where('tipo', 0)
                ->orderBy('id', 'desc')
                ->get();
    }

    public function myFriends() {
        return Usuarios::where('id', '<>', $this->id)->get();
    }

    public function likeComment($publicacion) {
        return MeGusta::likeByIds($this->id, $publicacion) > 0;
    }

    public function dontLike($publicacion) {
        MeGusta::deleteByIds($this->id, $publicacion);
    }
}
