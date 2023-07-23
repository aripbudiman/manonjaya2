<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_petugas' => 'required|max:255|unique:petugas,name',
                'role' => 'required|max:255',
                'status' => 'required|max:255'
            ]);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
        $petugas =new Petugas;
        $petugas->name=$request->nama_petugas;
        $petugas->role=$request->role;
        $petugas->status=$request->status;
        $petugas->save();
        return response()->json(['message'=>'Data berhasil ditambahkan!']);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'nama_petugas' => 'required|max:255|unique:petugas,name,'.$id,
                'role' => 'required|max:255',
                'status' => 'required|max:255'
            ]);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        $petugas=Petugas::find($id);
        $petugas->name=$request->nama_petugas;
        $petugas->role=$request->role;
        $petugas->status=$request->status;
        $petugas->save();
        return response()->json(['message'=>'Petugas berhasil diubah!']);
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
