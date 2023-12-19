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
        Schema::create('program_kimia', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('info1')->nullable();
            $table->text('info2')->nullable();
            $table->text('info3')->nullable();
            $table->text('info4')->nullable();
            $table->text('info5')->nullable();
            $table->text('foto')->nullable();
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
        Schema::dropIfExists('program_kimia');
    }
};
