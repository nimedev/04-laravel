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

Route::post('/loguear', function() {
    $email = Input::get('email');
    $password = Input::get('password');
    if (Auth::attempt(['correo' => $email, 'password' => $password])) {
        return Redirect::to('/profile');
    } else {
        echo "NO!";
    }
});

Route:: group(array('before' => 'auth'), function () {
    Route::controller('publicacion', 'PublicacionController');
    Route::controller('profile', 'ProfileController');
});
