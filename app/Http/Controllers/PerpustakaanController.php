<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpustakaan = Perpustakaan::join('buku','rak_buku.id_buku','buku.id')
        ->join('jenis_buku','rak_buku.id_jenis_buku','jenis_buku.id')
        ->select('rak_buku.id','buku.judul','buku.tahun_terbit','jenis_buku.jenis')
        ->get();
        return view('tampil0250', ['perpustakaan' => $perpustakaan]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah0250');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Perpustakaan::create([
            'id' => $request->id,
            'id_buku' => $request->id_buku,
            'id_jenis_buku' => $request->id_jenis_buku,
        ]);

        return redirect('perpustakaan');
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
        $perpustakaan = Perpustakaan::find($id);
        return view('edit0250', ['perpustakaan' => $perpustakaan]);
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
        $perpustakaan = Perpustakaan::find($id);
        $perpustakaan->id = $request->id;
        $perpustakaan->id_buku = $request->id_buku;
        $perpustakaan->id_jenis_buku = $request->id_jenis_buku;
        $perpustakaan->save();

        return redirect('perpustakaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perpustakaan = Perpustakaan::find($id);
        $perpustakaan->delete();

        return redirect('perpustakaan');
    }
}
