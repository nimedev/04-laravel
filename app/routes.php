<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', function() {
    if (Auth::check()) {
        return Redirect::to("/profile");
    } else {
        return View::make('general.login');
    }
});

Route::get('/profile', ['before' => ['auth'], function() {

$publicaciones = Publicaciones::orderBy('id','desc')->get();
return View::make('perfil.perfil')
                ->with('nombre', Auth::user()->nombre)
                ->with('publicaciones', $publicaciones);
}]);

Route::post('/loguear', function() {
    $email = Input::get('email');
    $password = Input::get('password');
    if (Auth::attempt(['correo' => $email, 'password' => $password])) {
        return Redirect::to('/profile');
    } else {
        echo "NO!";
    }
});

Route::get('/logout', function() {
    Auth::logout();
    return Redirect::to("/");
});

Route::controller('publicacion', 'PublicacionController');
