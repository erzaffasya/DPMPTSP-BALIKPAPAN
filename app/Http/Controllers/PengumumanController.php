<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pengumuman = Pengumuman::all();
        return view('admin.Pengumuman.index', compact('Pengumuman'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Pengumuman.tambah');
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
            'isi' => 'required',
        ]);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Pengumuman/Gambar/" . $file_name;
            $request->gambar->storeAs('public/Pengumuman/Gambar', $file_name);
        } else {
            $txt = null;
        }

        if (isset($request->file)) {
            $extention = $request->file->extension();
            $file_name1 = time() . '.' . $extention;
            $txt1 = "storage/Pengumuman/File/" . $file_name1;
            $request->file->storeAs('public/Pengumuman/File', $file_name1);
        } else {
            $txt1 = null;
        }

        $Pengumuman = Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $txt,
            'file' => $txt1,
            'link' => $request->link,
            'users_id' => Auth::user()->id,
            'slug' => strtolower(str_replace(' ', '-', $request->judul))
        ]);
        

        return redirect()->route('Pengumuman.index')
            ->with('success', 'Pengumuman Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $Pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $Pengumuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $Pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Pengumuman = Pengumuman::find($id);
        return view('admin.Pengumuman.edit', compact('Pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $Pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Pengumuman = Pengumuman::find($id);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Pengumuman/Gambar/" . $file_name;
            $request->gambar->storeAs('public/Pengumuman/Gambar', $file_name);
            Storage::delete("public/Pengumuman/Gambar/$Pengumuman->gambar");
        } else {
            $txt = $Pengumuman->gambar;
        }

        if (isset($request->file)) {
            $extention = $request->file->extension();
            $file_name1 = time() . '.' . $extention;
            $txt1 = "storage/Pengumuman/File/" . $file_name1;
            $request->file->storeAs('public/Pengumuman/File', $file_name1);
            Storage::delete("public/Pengumuman/File/$Pengumuman->file");
        } else {
            $txt1 = $Pengumuman->file;
        }

        $Pengumuman->judul = $request->judul;
        $Pengumuman->isi = $request->isi;
        $Pengumuman->gambar = $txt;
        $Pengumuman->file = $txt1;
        $Pengumuman->link = $request->link;
        $Pengumuman->users_id = Auth::user()->id;
        $Pengumuman->SLUG = strtolower(str_replace(' ', '-', $request->judul));
        $Pengumuman->save();

        return redirect()->route('Pengumuman.index')
            ->with('edit', 'Pengumuman Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $Pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pengumuman = Pengumuman::findOrFail($id);
        Storage::delete("public/Pengumuman/$Pengumuman->gambar");
        $Pengumuman->delete();
        return redirect()->route('Pengumuman.index')
            ->with('delete', 'Pengumuman Berhasil Dihapus');
    }
}
