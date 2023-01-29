<?php

namespace App\Http\Controllers;

use App\Models\Majelis;
use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Wakalah;

class WakalahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wakalah =Wakalah::all();
        return view('wakalah.index',['title'=>'Wakalah'],compact('wakalah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $petugas =Petugas::where('status','!=','non aktif')->get();
        $majelis=Majelis::all();
        return view('wakalah.create',['title'=>'Create Wakalah'],compact('petugas','majelis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trxDate=$request->trx_date;
        $namaAnggota=$request->nama_anggota;
        $majelis=$request->majelis;
        $petugas=$request->petugas;
        $nominal=$request->nominal;
        for($i=0; $i<count($petugas);$i++){
            $data =[
                'petugas'=>$petugas[$i],
                'nama_anggota'=>$namaAnggota[$i],
                'majelis'=>$majelis[$i],
                'nominal'=>str_replace('.','',$nominal[$i]),
                'status'=>'OnProses',
                'trx_wkl'=>$trxDate
            ];
            Wakalah::create($data);
        }
        return back()->with('success','Wakalah hasbeen successfuly');
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
        //
    }
}
