<?php

namespace App\Http\Controllers;

use App\Models\LinkTerkait;
use Illuminate\Http\Request;

class LinkTerkaitController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LinkTerkait = LinkTerkait::all();
        return view('admin.LinkTerkait.index', compact('LinkTerkait'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.LinkTerkait.tambah');
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
            'link' => 'required',
        ]);


        $LinkTerkait = LinkTerkait::create([
            'judul' => $request->judul,
            'link' => $request->link,
        ]);


        return redirect()->route('LinkTerkait.index')
            ->with('success', 'LinkTerkait Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LinkTerkait  $LinkTerkait
     * @return \Illuminate\Http\Response
     */
    public function show(LinkTerkait $LinkTerkait)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LinkTerkait  $LinkTerkait
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $LinkTerkait = LinkTerkait::find($id);
        return view('admin.LinkTerkait.edit', compact('LinkTerkait'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LinkTerkait  $LinkTerkait
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $LinkTerkait = LinkTerkait::find($id);
        $LinkTerkait->judul = $request->judul;
        $LinkTerkait->link = $request->link;
        $LinkTerkait->save();

        return redirect()->route('LinkTerkait.index')
            ->with('edit', 'LinkTerkait Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LinkTerkait  $LinkTerkait
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $LinkTerkait = LinkTerkait::findOrFail($id);
        $LinkTerkait->delete();
        return redirect()->route('LinkTerkait.index')
            ->with('delete', 'LinkTerkait Berhasil Dihapus');
    }
}
