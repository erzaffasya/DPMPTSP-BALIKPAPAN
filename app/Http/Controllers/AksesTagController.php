<?php

namespace App\Http\Controllers;

use App\Models\AksesTag;
use Illuminate\Http\Request;

class AksesTagController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AksesTag = AksesTag::all();
        return view('admin.AksesTag.index', compact('AksesTag'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.AksesTag.tambah');
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
            'berita_id' => 'required',
            'tag_berita_id' => 'required',
        ]);

        AksesTag::create([
            'berita_id' => $request->berita_id,
            'tag_berita_id' => $request->tag_berita_id,
        ]);

        return redirect()->route('AksesTag.index')
            ->with('success', 'AksesTag Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AksesTag  $AksesTag
     * @return \Illuminate\Http\Response
     */
    public function show(AksesTag $AksesTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AksesTag  $AksesTag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $AksesTag = AksesTag::find($id);
        return view('admin.AksesTag.edit', compact('AksesTag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AksesTag  $AksesTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $AksesTag = AksesTag::find($id);
        $AksesTag->berita_id = $request->berita_id;
        $AksesTag->tag_berita_id = $request->tag_berita_id;
        $AksesTag->save();

        return redirect()->route('AksesTag.index')
        ->with('edit', 'AksesTag Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AksesTag  $AksesTag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $AksesTag = AksesTag::findOrFail($id);
        $AksesTag->delete();
        return redirect()->route('AksesTag.index')
            ->with('delete', 'AksesTag Berhasil Dihapus');
    }
}
