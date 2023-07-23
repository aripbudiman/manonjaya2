<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangHilang extends Model
{
    use HasFactory;
    protected $table='barang_hilang';
    protected $guarded = [];

    public function items(){
        return $this->belongsTo(AlatTulisKantor::class,'item_id');
    }
}
