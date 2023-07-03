<?php

namespace App\Http\Controllers;

use App\Models\Portal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortalController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Portal = Portal::all();
        return view('admin.Portal.index', compact('Portal'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Portal.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
        ]);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Portal/Gambar/" . $file_name;
            $request->gambar->storeAs('public/Portal/Gambar', $file_name);
        } else {
            $txt = null;
        }

        $Portal = Portal::create([
            'judul' => $request->judul,
            'urut' => $request->urut,
            'link' => $request->link,
            'gambar' => $txt,
        ]);



        return redirect()->route('Portal.index')
            ->with('success', 'Portal Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portal  $Portal
     * @return \Illuminate\Http\Response
     */
    public function show(Portal $Portal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portal  $Portal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Portal = Portal::find($id);
        return view('admin.Portal.edit', compact('Portal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portal  $Portal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Portal = Portal::find($id);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Portal/Gambar/" . $file_name;
            $request->gambar->storeAs('public/Portal/Gambar', $file_name);
            Storage::delete("public/Portal/Gambar/$Portal->gambar");
        } else {
            $txt = $Portal->gambar;
        }


        $Portal->judul = $request->judul;
        $Portal->urut = $request->urut;
        $Portal->link = $request->link;
        $Portal->gambar = $txt;
        $Portal->save();

        return redirect()->route('Portal.index')
            ->with('edit', 'Portal Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portal  $Portal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Portal = Portal::findOrFail($id);
        Storage::delete("public/Portal/$Portal->gambar");
        $Portal->delete();
        return redirect()->route('Portal.index')
            ->with('delete', 'Portal Berhasil Dihapus');
    }

}
