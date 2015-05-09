<?php

class MeGusta extends Eloquent {

    protected $table = 'me_gusta';

    public static function likes($id) {
        return MeGusta::where('publicacion', $id)->count();
    }

}
