<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginTable extends Migration
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
            $table->string('username', 25);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('alamatperusahaan', 25);
            $table->string('kotaperusahaan', 20);
            $table->bigInteger('npwp');
            $table->bigInteger('notelepon');
            $table->enum('level', ['Admin', 'User']);
            $table->tinyInteger('verified')->default(0);
            $table->string('email_token')->index()->nullable();
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
