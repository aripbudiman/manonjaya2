<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatTulisKantor;
use App\Models\BarangHilang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Petugas;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class AtkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =AlatTulisKantor::with(['barangmasuk'])->withCount('barangmasuk')->get();
        // return $items;
        return view('atk.index',['title'=>'Alat Tulis Kantor'],compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atk.create_item',['title'=>'Create Items']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item=$request->item_name;
        $satuan=$request->satuan;
        for($i=0; $i<count($item);$i++){
            $data = [
                'item_name'=>$item[$i],
                'satuan'=>$satuan[$i]
            ];
            AlatTulisKantor::create($data);
        }
        return redirect()->route('atk.index')->with('success','Item hasbeen succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AlatTulisKantor::destroy($id);
        return back();
    }

    public function update_item(Request $request){
            $id =$request->id;
            $item=AlatTulisKantor::findOrFail($id);
            $item->item_name=$request->item_name;
            $item->satuan=$request->satuan;
            $item->save();
            return back();
    }

    public function indexBarangMasuk(){
        $barangmasuk = BarangMasuk::with('items')->get();
        
        return view('atk.indexbarangmasuk',['title'=>'Barang Masuk'],compact('barangmasuk'));
    }

    public function createBarangMasuk(){
        $items =AlatTulisKantor::all();
        return view('atk.createbarangmasuk',['title'=>'Create Barang Masuk'],compact('items'));
    }

    public function storeBarangMasuk(Request $request){
        $date =$request->trx_date;
        $newdate=str_replace('/','-',$date);
        
        $item_id=$request->item_id;
        $qty=$request->qty;
        for($i=0; $i<count($item_id);$i++){
            $data = [
                'trx_date'=>$newdate,
                'item_id'=>$item_id[$i],
                'qty'=>$qty[$i]
            ];
            BarangMasuk::create($data);
        }
        return redirect()->route('barangmasuk')->with('success','Item hasbeen succesfully');
    }

    public function destroyBarangMasuk(BarangMasuk $barangMasuk){
        $barangMasuk->delete();
        return back();
    }

    public function indexBarangKeluar(){
        $barangkeluar = BarangKeluar::with('items')->get();
        return view('atk.indexbarangkeluar',['title'=>'Barang Keluar'],compact('barangkeluar'));
    }

    public function createBarangKeluar(){
        $items =AlatTulisKantor::all();
        $petugas =Petugas::where('status','!=','non aktif')->get();
        return view('atk.createbarangkeluar',['title'=>'Create Barang Keluar'],compact('items','petugas'));
    }

    public function storeBarangKeluar(Request $request){
        $date =$request->trx_date;
        $newdate=str_replace('/','-',$date);
        
        $item_id=$request->item_id;
        $petugas=$request->petugas;
        $qty=$request->qty;
        for($i=0; $i<count($item_id);$i++){
            $data = [
                'trx_date'=>$newdate,
                'item_id'=>$item_id[$i],
                'petugas'=>$petugas[$i],
                'qty'=>$qty[$i]
            ];
            BarangKeluar::create($data);
        }
        return redirect()->route('barangkeluar')->with('success','Item hasbeen succesfully');
    }

    public function destroyBarangKeluar(BarangKeluar $barangKeluar){
        $barangKeluar->delete();
        return back();
    }

    public function indexBarangHilang(){
        $baranghilang = BarangHilang::with('items')->get();
        return view('atk.indexbaranghilang',['title'=>'Barang Hilang'],compact('baranghilang'));
    }

    public function createBarangHilang(){
        $items =AlatTulisKantor::all();
        return view('atk.createbaranghilang',['title'=>'Create Barang Hilang'],compact('items'));
    }

    public function storeBarangHilang(Request $request){
        $date =$request->trx_date;
        $newdate=str_replace('/','-',$date);
        
        $item_id=$request->item_id;
        $qty=$request->qty;
        for($i=0; $i<count($item_id);$i++){
            $data = [
                'trx_date'=>$newdate,
                'item_id'=>$item_id[$i],
                'qty'=>$qty[$i]
            ];
            BarangHilang::create($data);
        }
        return redirect()->route('baranghilang')->with('success','Item hasbeen succesfully');
    }

    public function destroyBarangHilang(BarangHilang $barangHilang){
        $barangHilang->delete();
        return back();
    }
}
