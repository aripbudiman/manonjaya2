<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER `TambahStok` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN UPDATE atk SET stok=stok+new.qty WHERE atk.id=new.item_id; END');
        DB::unprepared('CREATE TRIGGER `DeleteBarangMasuk` AFTER DELETE ON `barang_masuk` FOR EACH ROW BEGIN UPDATE atk SET stok=stok-old.qty WHERE atk.id=old.item_id; END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
