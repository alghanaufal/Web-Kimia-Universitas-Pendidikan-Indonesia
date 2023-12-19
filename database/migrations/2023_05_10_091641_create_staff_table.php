<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_posisi')->nullable();
            $table->unsignedBigInteger('id_lab')->nullable();
            $table->unsignedBigInteger('id_dosen');
            $table->timestamps();
            
            $table->foreign('id_posisi')->references('id')->on('posisi')->onDelete('cascade');
            $table->foreign('id_lab')->references('id')->on('fasilitas')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id')->on('dosen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
};
