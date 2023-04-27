<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Banner = Banner::all();
        return view('admin.Banner.index', compact('Banner'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Banner.tambah');
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
            // 'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Banner/" . $file_name;
            $request->gambar->storeAs('public/Banner/', $file_name);
        } else {
            $txt = null;
        }


        $Banner = Banner::create([
            'judul' => $request->judul,
            'gambar' => $txt,
            // 'link' => $request->link,
            // 'deskripsi' => $request->deskripsi,
            'isActive' => $request->isActive,
        ]);
        

        return redirect()->route('Banner.index')
            ->with('success', 'Banner Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $Banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Banner = Banner::find($id);
        return view('admin.Banner.edit', compact('Banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Banner = Banner::find($id);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Banner/" . $file_name;
            $request->gambar->storeAs('public/Banner', $file_name);
            Storage::delete("public/Banner/$Banner->gambar");
        } else {
            $txt = $Banner->gambar;
        }

        $Banner->judul = $request->judul;
        $Banner->gambar = $txt;
        // $Banner->link = $request->link;
        // $Banner->deskripsi = $request->deskripsi;
        $Banner->isActive = $request->isActive;
        $Banner->save();

        return redirect()->route('Banner.index')
            ->with('edit', 'Banner Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Banner = Banner::findOrFail($id);
        Storage::delete("public/Banner/$Banner->gambar");
        $Banner->delete();
        return redirect()->route('Banner.index')
            ->with('delete', 'Banner Berhasil Dihapus');
    }
}
