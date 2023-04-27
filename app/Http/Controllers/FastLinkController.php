<?php

namespace App\Http\Controllers;

use App\Models\FastLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FastLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FastLink = FastLink::all();
        return view('admin.FastLink.index', compact('FastLink'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.FastLink.tambah');
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
            'logo' => 'required',
        ]);

        if (isset($request->logo)) {
            $extention = $request->logo->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/FastLink/" . $file_name;
            $request->logo->storeAs('public/FastLink/', $file_name);
        } else {
            $file_name = null;
        }


        $FastLink = FastLink::create([
            'judul' => $request->judul,
            'logo' => $txt,
            'link' => $request->link,
        ]);


        return redirect()->route('FastLink.index')
            ->with('success', 'FastLink Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FastLink  $FastLink
     * @return \Illuminate\Http\Response
     */
    public function show(FastLink $FastLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FastLink  $FastLink
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $FastLink = FastLink::find($id);
        return view('admin.FastLink.edit', compact('FastLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FastLink  $FastLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $FastLink = FastLink::find($id);

        if (isset($request->logo)) {
            $extention = $request->logo->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/FastLink/" . $file_name;
            $request->logo->storeAs('public/FastLink', $file_name);
            Storage::delete("public/FastLink/$FastLink->logo");
        } else {
            $txt = $FastLink->logo;
        }

        $FastLink->judul = $request->judul;
        $FastLink->logo = $txt;
        $FastLink->link = $request->link;
        $FastLink->save();

        return redirect()->route('FastLink.index')
            ->with('edit', 'FastLink Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FastLink  $FastLink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $FastLink = FastLink::findOrFail($id);
        Storage::delete("public/FastLink/$FastLink->logo");
        $FastLink->delete();
        return redirect()->route('FastLink.index')
            ->with('delete', 'FastLink Berhasil Dihapus');
    }
}
