<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNegotiationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negotiation', function (Blueprint $table) {
            $table->increments('idpenawaran');
            $table->integer('idlelang');
            $table->string('namalelang', 25);
            $table->integer('id');
            $table->string('username', 25);
            $table->string('nilaitawar');
            $table->string('uploadtawaran');
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
        Schema::dropIfExists('negotiation');
    }
}
