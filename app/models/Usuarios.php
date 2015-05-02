<?php

class Usuarios extends Eloquent {

    protected $table = 'usuarios';

    public function myComments() {
        return $publicaciones = Publicaciones::where('usuario', $this->id)
                ->orderBy('id', 'desc')
                ->get();
    }

}
