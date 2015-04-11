<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuario extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('usuarios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('correo');
            $table->string('password');
            $table->timestamps();
            $table->rememberToken();
        });

        Schema::create('publicaciones', function(Blueprint $table) {
            $table->increments('id');
            $table->text('publicacion');
            $table->binary('tipo');
            $table->integer('usuario')->unsigned();
            $table->foreign('usuario')->references('id')->on('usuarios');
            $table->integer('padre')->unsigned()->nullable();
            $table->foreign('padre')->references('id')->on('publicaciones');
            $table->timestamps();
        });

        Schema::create('me_gusta', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario')->unsigned();
            $table->foreign('usuario')->references('id')->on('usuarios');
            $table->integer('publicacion')->unsigned();
            $table->foreign('publicacion')->references('id')->on('publicaciones');
            $table->timestamps();
        });

        DB::table('usuarios')->insert([
            'nombre' => 'Nicolas',
            'correo' => 'nime@mail.com',
            'password' => Hash::make('1234')
        ]);
        
        DB::table('usuarios')->insert([
            'nombre' => 'Beatriz',
            'correo' => 'neca@mail.com',
            'password' => Hash::make('123')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('me_gusta', function(Blueprint $table) {
            Schema::drop('me_gusta');
        });
        Schema::drop('publicaciones', function(Blueprint $table) {
            Schema::drop('publicaciones');
        });
        Schema::drop('usuarios', function(Blueprint $table) {
            Schema::drop('usuarios');
        });
    }

}
