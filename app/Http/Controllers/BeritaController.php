<?php

namespace App\Http\Controllers;

use App\Models\AksesTag;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\TagBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Berita = Berita::all();
        return view('admin.Berita.index', compact('Berita'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $KategoriBerita = KategoriBerita::all();
        $TagBerita = TagBerita::all();
        return view('admin.Berita.tambah', compact('KategoriBerita', 'TagBerita'));
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
            'gambar' => 'required',
        ]);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Berita/Gambar/" . $file_name;
            $request->gambar->storeAs('public/Berita/Gambar', $file_name);
        } else {
            $txt = null;
        }

        if (isset($request->file)) {
            $extention = $request->file->extension();
            $file_name1 = time() . '.' . $extention;
            $txt1 = "storage/Berita/File/" . $file_name1;
            $request->file->storeAs('public/Berita/File', $file_name1);
        } else {
            $txt1 = null;
        }

        $Berita = Berita::create([
            'judul' => $request->judul,
            // 'deskripsi_singkat' => $request->deskripsi_singkat,
            'isi' => $request->isi,
            'gambar' => $txt,
            'file' => $txt1,
            'link' => $request->link,
            'users_id' => Auth::user()->id,
            'slug' => strtolower(str_replace(' ', '-', $request->judul))
            // 'kategori_berita_id' => $request->kategori_berita_id,
        ]);

        // if ($request->tag_berita) {
        //     foreach ($request->tag_berita_id as $item) {
        //         $SP = AksesTag::create([
        //             'berita_id' => $Berita->id,
        //             'tag_berita_id' => $item
        //         ]);
        //     }
        // }



        return redirect()->route('Berita.index')
            ->with('success', 'Berita Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $Berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $Berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $Berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Berita = Berita::find($id);
        return view('admin.Berita.edit', compact('Berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $Berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Berita = Berita::find($id);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Berita/Gambar/" . $file_name;
            $request->gambar->storeAs('public/Berita/Gambar', $file_name);
            Storage::delete("public/Berita/Gambar/$Berita->gambar");
        } else {
            $txt = $Berita->gambar;
        }

        if (isset($request->file)) {
            $extention = $request->file->extension();
            $file_name1 = time() . '.' . $extention;
            $txt1 = "storage/Berita/File/" . $file_name1;
            $request->file->storeAs('public/Berita/File', $file_name1);
            Storage::delete("public/Berita/File/$Berita->file");
        } else {
            $txt1 = $Berita->file;
        }

        $Berita->judul = $request->judul;
        // $Berita->deskripsi_singkat = $request->deskripsi_singkat;
        $Berita->isi = $request->isi;
        $Berita->gambar = $txt;
        $Berita->file = $txt1;
        $Berita->link = $request->link;
        $Berita->users_id = Auth::user()->id;
        // $Berita->kategori_berita_id = $request->kategori_berita_id;
        $Berita->slug = strtolower(str_replace(' ', '-', $request->judul));
        $Berita->save();

        return redirect()->route('Berita.index')
            ->with('edit', 'Berita Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $Berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Berita = Berita::findOrFail($id);
        Storage::delete("public/Berita/$Berita->gambar");
        $Berita->delete();
        return redirect()->route('Berita.index')
            ->with('delete', 'Berita Berhasil Dihapus');
    }
}
