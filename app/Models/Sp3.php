<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sp3 extends Model
{
    use HasFactory,SoftDeletes;

    public $table='sp3';
    protected $guarded=[];

    public function wakalah(){
        return $this->hasMany(Wakalah::class,'id','wakalah_id');
    }


}
