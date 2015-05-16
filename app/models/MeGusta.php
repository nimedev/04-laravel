<?php

class MeGusta extends Eloquent {

    protected $table = 'me_gusta';

    public static function likes($id) {
        return MeGusta::where('publicacion', $id)->count();
    }

    public static function likeByIds($uid, $pid) {
        return MeGusta::where('usuario', $uid)
                        ->where('publicacion', $pid)
                        ->count();
    }

    public static function deleteByIds($uid, $pid) {
        MeGusta::where('usuario', $uid)
                ->where('publicacion', $pid)
                ->delete();
    }

}
