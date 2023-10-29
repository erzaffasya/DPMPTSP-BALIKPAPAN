<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BannerPortal;
use Illuminate\Http\Request;

class BannerPortalController extends Controller
{
    public function index()
    {
        $BannerPortal = BannerPortal::find(1);

        if ($BannerPortal == null) {
            BannerPortal::create(['id' => 1]);
        }
        return view('admin.BannerPortal.index', compact('BannerPortal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $BannerPortal = BannerPortal::find(1);

        if ($request->gambar) {
            $extention = $request->gambar->extension();
            $file_name1 = time() . '.' . $extention;
            $txt1 = "storage/BannerPortal/gambar/" . $file_name1;
            $request->gambar->storeAs('public/BannerPortal/gambar', $file_name1);
            $BannerPortal->gambar = $txt1;
        }
        $BannerPortal->deskripsi = $request->deskripsi;
        $BannerPortal->link = $request->link;
        $BannerPortal->youtube = $request->youtube;
        $BannerPortal->isActive = $request->isActive;
        $BannerPortal->save();

        return back()->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy(Request $request)
    {
        
        $BannerPortal = BannerPortal::find(1)->delete();

        return redirect()->route('BannerPortal.index');
    }
}
