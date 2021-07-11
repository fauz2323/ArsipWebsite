<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_murids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('murid_id');
            $table->string('path');
            $table->timestamps();

            $table->foreign('murid_id')->references('id')->on('murids')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_murids');
    }
}
