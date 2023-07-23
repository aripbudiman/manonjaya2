<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlatTulisKantor extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='atk';
    protected $guarded = [];
    public $timestamps = false;

    public function barangmasuk(){
        return $this->hasMany(BarangMasuk::class,'item_id');
    }
    public function barangkeluar(){
        return $this->hasMany(BarangKeluar::class,'item_id');
    }
    public function baranghilang(){
        return $this->hasMany(BarangHilang::class,'item_id');
    }
}
