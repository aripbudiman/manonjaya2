<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table='barang_keluar';
    protected $guarded = [];

    public function items(){
        return $this->belongsTo(AlatTulisKantor::class,'item_id');
    }
}
