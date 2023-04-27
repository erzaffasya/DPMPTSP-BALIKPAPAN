<?php

namespace App\Http\Controllers;

use App\Models\DataSurvey;
use Illuminate\Http\Request;

class DataSurveyController extends Controller
{
    public function index()
    {
        $DataSurvey = DataSurvey::all();
        return view('admin.DataSurvey.index', compact('DataSurvey'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.DataSurvey.tambah');
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
            'survey_kepuasan_id' => 'required',
        ]);

        DataSurvey::create([
            'survey_kepuasan_id' => $request->survey_kepuasan_id,
        ]);

        return redirect()->route('DataSurvey.index')
            ->with('success', 'DataSurvey Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataSurvey  $DataSurvey
     * @return \Illuminate\Http\Response
     */
    public function show(DataSurvey $DataSurvey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataSurvey  $DataSurvey
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $DataSurvey = DataSurvey::find($id);
        return view('admin.DataSurvey.edit', compact('DataSurvey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataSurvey  $DataSurvey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $DataSurvey = DataSurvey::find($id);
        $DataSurvey->survey_kepuasan_id = $request->survey_kepuasan_id;
        $DataSurvey->save();

        return redirect()->route('DataSurvey.index')
        ->with('edit', 'DataSurvey Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataSurvey  $DataSurvey
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DataSurvey = DataSurvey::findOrFail($id);
        $DataSurvey->delete();
        return redirect()->route('DataSurvey.index')
            ->with('delete', 'DataSurvey Berhasil Dihapus');
    }
}
