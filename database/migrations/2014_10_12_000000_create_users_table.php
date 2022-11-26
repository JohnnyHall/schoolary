<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('primeiro_nome');
            $table->string('sobrenome');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('nacionalidade');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('zip');
            $table->string('photo')->nullable();
            $table->string('Aniversario')->nullable();
            $table->string('lista_filmes')->nullable();
            $table->string('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
