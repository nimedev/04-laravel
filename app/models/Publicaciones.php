<?php

class Publicaciones extends Eloquent {

    protected $table = 'publicaciones';

    public function freshTimestamp() {
        return date('Y-m-d h:i:s');
    }

    public function likes() {
        return MeGusta::likes($this->id);
    }

    public function likeTo($uid) {
        return MeGusta::likeByIds($uid, $this->id) > 0 ? "Ya NO me Gusta" : "Me Gusta";
    }

    public function getComments() {
        return Publicaciones::where('padre', $this->id)
                ->where('tipo', 1)
                ->get();
    }

}
