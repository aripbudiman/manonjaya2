<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table='barang_masuk';
    protected $guarded = [];

    public function items(){
        return $this->belongsTo(AlatTulisKantor::class,'item_id');
    }
}
