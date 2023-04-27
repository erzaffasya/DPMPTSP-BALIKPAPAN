<?php

namespace App\Http\Controllers;

use App\Models\TagBerita;
use Illuminate\Http\Request;

class TagBeritaController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TagBerita = TagBerita::all();
        return view('admin.TagBerita.index', compact('TagBerita'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.TagBerita.tambah');
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
            'nama_tag' => 'required',
        ]);

        TagBerita::create([
            'nama_tag' => $request->nama_tag,
        ]);

        return redirect()->route('TagBerita.index')
            ->with('success', 'TagBerita Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TagBerita  $TagBerita
     * @return \Illuminate\Http\Response
     */
    public function show(TagBerita $TagBerita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TagBerita  $TagBerita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $TagBerita = TagBerita::find($id);
        return view('admin.TagBerita.edit', compact('TagBerita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TagBerita  $TagBerita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $TagBerita = TagBerita::find($id);
        $TagBerita->nama_tag = $request->nama_tag;
        $TagBerita->save();

        return redirect()->route('TagBerita.index')
        ->with('edit', 'TagBerita Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TagBerita  $TagBerita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $TagBerita = TagBerita::findOrFail($id);
        $TagBerita->delete();
        return redirect()->route('TagBerita.index')
            ->with('delete', 'TagBerita Berhasil Dihapus');
    }
}
