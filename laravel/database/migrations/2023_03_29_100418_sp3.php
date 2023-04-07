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
        Schema::create('sp3', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wakalah_id');
            $table->enum('status',['masuk','belum masuk'])->default('belum masuk');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('wakalah_id')->references('id')->on('wakalah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sp3');
    }
};
