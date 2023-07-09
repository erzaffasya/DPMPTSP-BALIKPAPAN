<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use App\Models\PerizinanDetail;
use Illuminate\Http\Request;

class PerizinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Perizinan = Perizinan::all();
        return view('admin.Perizinan.index', compact('Perizinan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Perizinan = null;
        return view('admin.Perizinan.tambah', compact('Perizinan'));
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
            'perizinan' => 'required'
        ]);

        Perizinan::create([
            'perizinan' => $request->perizinan,
            'deskripsi' => $request->deskripsi,
            'isActive' => $request->isActive,
            'urut' => $request->urut,
        ]);

        // return back();
        if ($request->parent_id != null) {
            return redirect()->route('sub-Perizinan', $request->parent_id)
                ->with('success', 'Perizinan Berhasil Ditambahkan');
        } else {
            return redirect()->route('Perizinan.index')
                ->with('success', 'Perizinan Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perizinan  $Perizinan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Perizinan = Perizinan::find($id);
        return view('admin.Perizinan.tambah', compact('Perizinan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perizinan  $Perizinan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Perizinan = Perizinan::find($id);
        return view('admin.Perizinan.edit', compact('Perizinan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perizinan  $Perizinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Perizinan = Perizinan::find($id);
        $Perizinan->perizinan = $request->perizinan;
        $Perizinan->deskripsi = $request->deskripsi;
        $Perizinan->isActive = $request->isActive;
        $Perizinan->urut = $request->urut;
        $Perizinan->save();

        return redirect()->route('Perizinan.index')
            ->with('edit', 'Perizinan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perizinan  $Perizinan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Perizinan = Perizinan::findOrFail($id);
        $Perizinan->delete();
        return redirect()->route('Perizinan.index')
            ->with('delete', 'Perizinan Berhasil Dihapus');
    }


    public function settingDetail($id)
    {
        #
        $Perizinan = Perizinan::find($id);
        $PerizinanDetail = PerizinanDetail::where('perizinan_id', $Perizinan->id)->get();
        return redirect()->route('PerizinanDetail.show',$id);
    }
}
