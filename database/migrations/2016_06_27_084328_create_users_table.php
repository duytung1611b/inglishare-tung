<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email', 100);
            $table->string('password', 128);
            $table->longText('profileImage', 300);
            $table->tinyInteger('gender');
            $table->longText('description', 128);
            $table->string('userType', 20);
            $table->string('firstName', 50);
            $table->string('lastName', 50);
            $table->boolean('banned');
            $table->date('birthday', 128);
            $table->string('api_token', 60)->unique();
            $table->integer('roleId')->unsigned();
            $table->foreign('roleId')->references('id')->on('roles')->onDelete('cascade');
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
        Schema::drop('users');
    }
}
