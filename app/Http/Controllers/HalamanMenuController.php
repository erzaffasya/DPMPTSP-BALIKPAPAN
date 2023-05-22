<?php

namespace App\Http\Controllers;

use App\Models\HalamanMenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HalamanMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $HalamanMenu = HalamanMenu::all();
        return view('admin.HalamanMenu.index', compact('HalamanMenu'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Menu = Menu::all();
        return view('admin.Menu.HalamanMenu.tambah', compact('Menu'));
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
            'isi' => 'required',
            'gambar' => 'required',
        ]);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/HalamanMenu/Gambar/" . $file_name;
            $request->gambar->storeAs('public/HalamanMenu/Gambar', $file_name);
        } else {
            $txt = null;
        }

        if (isset($request->file)) {
            $extention = $request->file->extension();
            $file_name1 = time() . '.' . $extention;
            $txt1 = "storage/HalamanMenu/File/" . $file_name1;
            $request->file->storeAs('public/HalamanMenu/File', $file_name1);
        } else {
            $txt1 = null;
        }

        $HalamanMenu = HalamanMenu::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $txt,
            'file' => $txt1,
            'link' => $request->link,
            'menu_id' => $request->menu_id,
            'slug' => strtolower(str_replace(' ', '-', $request->judul))
        ]);


        return redirect()->route('HalamanMenu.index')
            ->with('success', 'Halaman Menu Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HalamanMenu  $HalamanMenu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Menu = HalamanMenu::where('menu_id', $id)->first();
        return view('admin.Menu.HalamanMenu.tambah', compact('Menu', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HalamanMenu  $HalamanMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $HalamanMenu = HalamanMenu::find($id);
        return view('admin.HalamanMenu.edit', compact('HalamanMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HalamanMenu  $HalamanMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $HalamanMenu = HalamanMenu::where('menu_id', $id)->first();
        if ($HalamanMenu != null) {
            if ($request->gambar != null) {
                Storage::delete("public/HalamanMenu/Gambar/$HalamanMenu->gambar");
                $extention = $request->gambar->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/HalamanMenu/Gambar/" . $file_name;
                $request->gambar->storeAs('public/HalamanMenu/Gambar', $file_name);
            } else {
                $txt = $HalamanMenu->gambar;
            }

            if ($request->file != null) {
                Storage::delete("public/HalamanMenu/File/$HalamanMenu->file");
                $extention = $request->file->extension();
                $file_name1 = time() . '.' . $extention;
                $txt1 = "storage/HalamanMenu/File/" . $file_name1;
                $request->file->storeAs('public/HalamanMenu/File', $file_name1);
            } else {
                $txt1 = $HalamanMenu->file;
            }

            $HalamanMenu->judul = $request->judul;
            $HalamanMenu->isi = $request->isi;
            $HalamanMenu->gambar = $txt;
            $HalamanMenu->file = $txt1;
            $HalamanMenu->link = $request->link;
            $HalamanMenu->menu_id = $request->menu_id;
            $HalamanMenu->slug = strtolower(str_replace(' ', '-', $request->judul));
            $HalamanMenu->save();
        } else {
            if (isset($request->gambar)) {
                $extention = $request->gambar->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/HalamanMenu/Gambar/" . $file_name;
                $request->gambar->storeAs('public/HalamanMenu/Gambar', $file_name);
            } else {
                $txt = null;
            }

            if (isset($request->file)) {
                $extention = $request->file->extension();
                $file_name1 = time() . '.' . $extention;
                $txt1 = "storage/HalamanMenu/File/" . $file_name1;
                $request->file->storeAs('public/HalamanMenu/File', $file_name1);
            } else {
                $txt1 = null;
            }

            $HalamanMenu = HalamanMenu::create([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'gambar' => $txt,
                'file' => $txt1,
                'link' => $request->link,
                'menu_id' => $request->menu_id,
            ]);
        }

        if ($HalamanMenu->Menu->parent_id != null) {
            return redirect()->route('sub-menu', $HalamanMenu->Menu->parent_id)
                ->with('edit', 'HalamanMenu Berhasil Diedit');
        } else {
            return redirect()->route('Menu.index')
                ->with('edit', 'Halaman Menu Berhasil Diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HalamanMenu  $HalamanMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $HalamanMenu = HalamanMenu::where('menu_id', $id)->first();
        if ($HalamanMenu->gambar) {
            Storage::delete("public/HalamanMenu/Gambar/$HalamanMenu->gambar");
        }
        if ($HalamanMenu->file) {
            Storage::delete("public/HalamanMenu/File/$HalamanMenu->file");
        }
        $HalamanMenu->delete();

        if ($HalamanMenu->Menu->parent_id != null) {
            return redirect()->route('sub-menu', $HalamanMenu->Menu->parent_id)
                ->with('edit', 'HalamanMenu Berhasil Diedit');
        } else {
            return redirect()->route('Menu.index')
                ->with('edit', 'Halaman Menu Berhasil Diedit');
        }
    }
}
