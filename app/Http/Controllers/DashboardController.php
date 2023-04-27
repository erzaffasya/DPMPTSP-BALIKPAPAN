<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Berita;
use App\Models\HalamanMenu;
use App\Models\Menu;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $Berita = Berita::all();
        $HalamanMenu = HalamanMenu::all();
        $Menu = Menu::all();
        $Pengumuman = Pengumuman::all();
        $Banner = Banner::all();
        $User = User::all();
        return view('admin.index',compact('Berita','HalamanMenu','Menu','Pengumuman','Banner','User'));
    }
}
