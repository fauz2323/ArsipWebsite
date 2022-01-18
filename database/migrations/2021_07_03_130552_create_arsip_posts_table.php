<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_akun');
            $table->unsignedBigInteger('code_id');
            $table->string('nama_arsip');
            $table->text('keterangan_arsip');
            $table->timestamps();

            $table->foreign('code_id')->references('id')->on('code_arsips')->onDelete('cascade');
            $table->foreign('id_akun')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip_posts');
    }
}
