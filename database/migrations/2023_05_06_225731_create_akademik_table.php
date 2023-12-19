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
        Schema::create('akademik', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe', ['Pedoman Akademik', 'Penerimaan Mahasiswa', 'MBKM', 'Visiting Professor', 'Summer School', 'Learning Management System', 'Module', 'Tracer Study', 'Survey Kepuasan Mahasiswa']);
            $table->string('judul');
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->text('isi')->nullable();
            $table->text('foto')->nullable();
            $table->text('link')->nullable();
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
        Schema::dropIfExists('akademik');
    }
};
