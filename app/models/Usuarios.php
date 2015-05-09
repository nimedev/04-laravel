<?php

class Usuarios extends Eloquent {

    protected $table = 'usuarios';

    public function myComments() {
        return $publicaciones = Publicaciones::where('receptor', $this->id)
                ->orderBy('id', 'desc')
                ->get();
    }

    public function myFriends() {
        return Usuarios::where('id', '<>', $this->id)->get();
    }

}
