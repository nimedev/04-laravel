<?php

class Publicaciones extends Eloquent {

    protected $table = 'publicaciones';

    public function freshTimestamp() {
        return date('Y-m-d h:i:s');
    }
    
    public function likes() {
        return MeGusta::likes($this->id);
    }
}
