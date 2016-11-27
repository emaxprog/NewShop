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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('email', 30)->unique();
            $table->string('password', 60);
            $table->string('name', 30);
            $table->string('surname', 30);
            $table->string('phone', 11);
            $table->string('address', 150);
            $table->integer('postcode')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamp('created_at');

            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
