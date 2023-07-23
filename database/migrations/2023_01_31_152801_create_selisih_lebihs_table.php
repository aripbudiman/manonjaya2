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
        Schema::create('selisih_lebih', function (Blueprint $table) {
            $table->id();
            $table->string('trx_date');
            $table->string('petugas');
            $table->text('description');
            $table->decimal('debet',15,0);
            $table->decimal('kredit',15,0);
            $table->enum('status',['approve','pending'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selisih_lebih');
    }
};
