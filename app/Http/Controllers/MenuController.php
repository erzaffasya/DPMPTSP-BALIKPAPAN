<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Menu = Menu::all();
        return view('admin.Menu.index', compact('Menu'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Menu = null;
        return view('admin.Menu.tambah', compact('Menu'));
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
        //     'nama_menu' => 'required',
        //     'isActive' => 'required',
        //     'parent_id' => 'required',
        //     'urutan' => 'required',
        // ]);

        Menu::create([
            'nama_menu' => $request->nama_menu,
            // 'link' => $request->link,
            'isActive' => $request->isActive,
            'parent_id' => $request->parent_id,
            'urutan' => $request->urutan,
        ]);

        // return back();
        if ($request->parent_id != null) {
            return redirect()->route('sub-menu', $request->parent_id)
                ->with('success', 'Menu Berhasil Ditambahkan');
        } else {
            return redirect()->route('Menu.index')
                ->with('success', 'Menu Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Menu = Menu::find($id);
        return view('admin.Menu.tambah', compact('Menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Menu = Menu::find($id);
        return view('admin.Menu.edit', compact('Menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Menu = Menu::find($id);
        $Menu->nama_menu = $request->nama_menu;
        // $Menu->link = $request->link;
        $Menu->isActive = $request->isActive;
        // $Menu->parent_id = $request->parent_id;
        $Menu->urutan = $request->urutan;
        $Menu->save();

        return redirect()->route('Menu.index')
            ->with('edit', 'Menu Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Menu = Menu::findOrFail($id);
        $Menu->delete();
        return redirect()->route('Menu.index')
            ->with('delete', 'Menu Berhasil Dihapus');
    }

    public function subMenu($id)
    {
        $Menu = Menu::where('parent_id', $id)->get();
        $Judul = Menu::find($id);
        return view('admin.Menu.submenu', compact('Menu','id','Judul'));
    }
}
