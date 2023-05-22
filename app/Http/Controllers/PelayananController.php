<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelayananController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pelayanan = Pelayanan::all();
        return view('admin.Pelayanan.index', compact('Pelayanan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Pelayanan.tambah');
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Pelayanan/" . $file_name;
            $request->gambar->storeAs('public/Pelayanan/', $file_name);
        } else {
            $txt = null;
        }


        $Pelayanan = Pelayanan::create([
            'judul' => $request->judul,
            'gambar' => $txt,
            'deskripsi' => $request->deskripsi,
            'slug' => strtolower(str_replace(' ', '-', $request->judul))
        ]);


        return redirect()->route('Pelayanan.index')
            ->with('success', 'Pelayanan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelayanan  $Pelayanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelayanan $Pelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelayanan  $Pelayanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Pelayanan = Pelayanan::find($id);
        return view('admin.Pelayanan.edit', compact('Pelayanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelayanan  $Pelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Pelayanan = Pelayanan::find($id);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Pelayanan/" . $file_name;
            $request->gambar->storeAs('public/Pelayanan', $file_name);
            Storage::delete("public/Pelayanan/$Pelayanan->gambar");
        } else {
            $txt = $Pelayanan->gambar;
        }

        $Pelayanan->judul = $request->judul;
        $Pelayanan->gambar = $txt;
        $Pelayanan->deskripsi = $request->deskripsi;
        $Pelayanan->slug = strtolower(str_replace(' ', '-', $request->judul));
        $Pelayanan->save();

        return redirect()->route('Pelayanan.index')
            ->with('edit', 'Pelayanan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelayanan  $Pelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pelayanan = Pelayanan::findOrFail($id);
        Storage::delete("public/Pelayanan/$Pelayanan->gambar");
        $Pelayanan->delete();
        return redirect()->route('Pelayanan.index')
            ->with('delete', 'Pelayanan Berhasil Dihapus');
    }
}
