<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sp3;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class Sp3Controller extends Controller
{
    public function index(){
        $sp3 =Sp3::with('wakalah')->where('status','belum masuk')->get();
        // return $sp3;
        return view('sp3.index',['title'=>'Sp3 yang belum masuk'],compact('sp3'));
    }

    public function belum_masuk(Request $request,$id){
       // Validasi data inputan
    $validatedData = \Validator::make(
        ['wakalah_id' => $id],
        [
            'wakalah_id' => [
                'required',
                Rule::unique('sp3')->where(function ($query) use ($id) {
                    return $query->where('wakalah_id', $id);
                })
            ]
        ]
    )->validate();

    // Tambahkan data ke tabel sp3
    $sp3 = new Sp3;
    $sp3->wakalah_id = $id;
    $sp3->save();
    return redirect()->back()->with('success','Sp3 berhasil ditambahkan!!');
    }


    public function edit(Request $request, $status){
        $sp3 =Sp3::findOrFail($status);
        $sp3->status='masuk';
        $sp3->save();
        return back();
    }
}
