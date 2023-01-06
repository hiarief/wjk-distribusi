<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_rt', function (Blueprint $table) {
            $table->id();
            $table->string('kampung_id', 50)->nullable();
            $table->string('no', 50)->nullable();
            $table->string('ketua', 50)->nullable();
            $table->string('no_nik', 50)->nullable();
            $table->string('user_id', 50)->nullable();
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
        Schema::dropIfExists('m_rt');
    }
}