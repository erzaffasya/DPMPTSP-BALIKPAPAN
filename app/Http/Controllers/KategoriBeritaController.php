<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $KategoriBerita = KategoriBerita::all();
        return view('admin.KategoriBerita.index', compact('KategoriBerita'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.KategoriBerita.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        KategoriBerita::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('KategoriBerita.index')
            ->with('success', 'KategoriBerita Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriBerita  $KategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriBerita $KategoriBerita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBerita  $KategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $KategoriBerita = KategoriBerita::find($id);
        return view('admin.KategoriBerita.edit', compact('KategoriBerita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriBerita  $KategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $KategoriBerita = KategoriBerita::find($id);
        $KategoriBerita->nama_kategori = $request->nama_kategori;
        $KategoriBerita->deskripsi = $request->deskripsi;
        $KategoriBerita->save();

        return redirect()->route('KategoriBerita.index')
        ->with('edit', 'KategoriBerita Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriBerita  $KategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $KategoriBerita = KategoriBerita::findOrFail($id);
        $KategoriBerita->delete();
        return redirect()->route('KategoriBerita.index')
            ->with('delete', 'KategoriBerita Berhasil Dihapus');
    }
}
