<?php

namespace App\Http\Controllers;

use App\Models\PerizinanDetail;
use Illuminate\Http\Request;

class PerizinanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PerizinanDetail = PerizinanDetail::all();
        return view('admin.PerizinanDetail.index', compact('PerizinanDetail'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $PerizinanDetail = null;
        return view('admin.PerizinanDetail.tambah', compact('PerizinanDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'dasar_hukum' => 'required',
        //     'persyaratan' => 'required',
        //     'perizinan_id' => 'required',
        //     'waktu_proses' => 'required',
        // ]);

        PerizinanDetail::create([
            'dasar_hukum' => $request->dasar_hukum,
            'persyaratan' => $request->persyaratan,
            'masa_berlaku' => $request->masa_berlaku,
            'waktu_proses' => $request->waktu_proses,
            'proses_penerbitan' => $request->proses_penerbitan,
            'biaya_retribusi' => $request->biaya_retribusi,
            'urut' => $request->urut,
            'perizinan_id' => $request->perizinan_id,
        ]);

        // return back();
        if ($request->perizinan_id != null) {
            return redirect()->route('settingDetail', $request->perizinan_id)
                ->with('success', 'Perizinan Detail Berhasil Ditambahkan');
        } else {
            return redirect()->route('PerizinanDetail.index')
                ->with('success', 'Perizinan Detail Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerizinanDetail  $PerizinanDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PerizinanDetail = PerizinanDetail::find($id);
        // dd($PerizinanDetail);
        return view('admin.Perizinan.Detail.edit', compact('PerizinanDetail','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerizinanDetail  $PerizinanDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $PerizinanDetail = PerizinanDetail::find($id);
        return view('admin.PerizinanDetail.edit', compact('PerizinanDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerizinanDetail  $PerizinanDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $PerizinanDetail = PerizinanDetail::findOrNew($id);
        $PerizinanDetail->id = $id;
        $PerizinanDetail->dasar_hukum = $request->dasar_hukum;
        $PerizinanDetail->persyaratan = $request->persyaratan;
        $PerizinanDetail->masa_berlaku = $request->masa_berlaku;
        $PerizinanDetail->waktu_proses = $request->waktu_proses;
        $PerizinanDetail->proses_penerbitan = $request->proses_penerbitan;
        $PerizinanDetail->biaya_retribusi = $request->biaya_retribusi;
        $PerizinanDetail->urut = $request->urut;
        $PerizinanDetail->perizinan_id = $id;
        $PerizinanDetail->save();

        return redirect()->route('settingDetail', $id)
            ->with('success', 'Perizinan Detail Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerizinanDetail  $PerizinanDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PerizinanDetail = PerizinanDetail::findOrFail($id);
        $PerizinanDetail->delete();
        return redirect()->route('PerizinanDetail.index')
            ->with('delete', 'PerizinanDetail Berhasil Dihapus');
    }
}
