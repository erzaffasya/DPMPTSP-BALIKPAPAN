<?php

namespace App\Http\Controllers;

use App\Models\SurveyKepuasan;
use Illuminate\Http\Request;

class SurveyKepuasanController extends Controller
{
    public function index()
    {
        $SurveyKepuasan = SurveyKepuasan::all();
        return view('admin.SurveyKepuasan.index', compact('SurveyKepuasan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.SurveyKepuasan.tambah');
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
        ]);

        SurveyKepuasan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('SurveyKepuasan.index')
            ->with('success', 'SurveyKepuasan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyKepuasan  $SurveyKepuasan
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyKepuasan $SurveyKepuasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveyKepuasan  $SurveyKepuasan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $SurveyKepuasan = SurveyKepuasan::find($id);
        return view('admin.SurveyKepuasan.edit', compact('SurveyKepuasan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurveyKepuasan  $SurveyKepuasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $SurveyKepuasan = SurveyKepuasan::find($id);
        $SurveyKepuasan->judul = $request->judul;
        $SurveyKepuasan->deskripsi = $request->deskripsi;
        $SurveyKepuasan->save();

        return redirect()->route('SurveyKepuasan.index')
        ->with('edit', 'SurveyKepuasan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyKepuasan  $SurveyKepuasan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SurveyKepuasan = SurveyKepuasan::findOrFail($id);
        $SurveyKepuasan->delete();
        return redirect()->route('SurveyKepuasan.index')
            ->with('delete', 'SurveyKepuasan Berhasil Dihapus');
    }
}
