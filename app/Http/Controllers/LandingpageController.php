<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Berita;
use App\Models\FastLink;
use App\Models\HalamanMenu;
use App\Models\Pelayanan;
use App\Models\Pengumuman;
use App\Models\ProfileWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shetabit\Visitor\Models\Visit;

class LandingpageController extends Controller
{
    public function Home()
    {
        $Banner = Banner::all();
        $Berita = Berita::with(['User', 'kategoriBerita'])->latest()->paginate(4);
        $BeritaAtas = Berita::with(['User', 'kategoriBerita'])->latest()->paginate(4);
        $dataPopuler = Visit::select('visitable_id', DB::raw('count(id) as total'))
            ->groupBy('visitable_id')
            ->orderBy('total', 'DESC')
            ->limit(4)->get();
        $Populer = Berita::whereIn('id', $dataPopuler->pluck('visitable_id')->toArray())->get();
        $Pengumuman = Pengumuman::with('User')->get();
        $FastLink = FastLink::all();
        $RelatedPost = Berita::with(['User', 'kategoriBerita'])->inRandomOrder()->limit(4)->get();
        $ProfileWebsite = ProfileWebsite::find(1);
        $Pelayanan = Pelayanan::all();
        return view('tlandingpage.index', compact('Banner','ProfileWebsite','Pelayanan', 'Berita', 'Pengumuman', 'FastLink', 'RelatedPost', 'BeritaAtas', 'Populer'));
    }
    public function HalamanMenu($id)
    {

        $HalamanMenu = HalamanMenu::with('Menu')->find($id);
        $BeritaBaru = Berita::with(['User', 'kategoriBerita'])->latest()->paginate(4);
        $dataPopuler = Visit::select('visitable_id', DB::raw('count(id) as total'))
            ->groupBy('visitable_id')
            ->orderBy('total', 'DESC')
            ->limit(4)->get();
        $Populer = Berita::whereIn('id', $dataPopuler->pluck('visitable_id')->toArray())->get();
        if ($HalamanMenu != NULL) {
            return view('tlandingpage.regular', compact('HalamanMenu', 'BeritaBaru', 'Populer'));
        } else {
            return back();
        }
    }

    public function Berita()
    {
        $Berita = Berita::with(['User', 'kategoriBerita'])->latest()->paginate(4);
        $RelatedPost = Berita::with(['User', 'kategoriBerita'])->inRandomOrder()->limit(4)->get();
        $dataPopuler = Visit::select('visitable_id', DB::raw('count(id) as total'))
            ->groupBy('visitable_id')
            ->orderBy('total', 'DESC')
            ->limit(4)->get();
        $Populer = Berita::whereIn('id', $dataPopuler->pluck('visitable_id')->toArray())->get();
        return view('tlandingpage.berita', compact('Berita', 'RelatedPost', 'Populer'));
    }

    public function DetailBerita($slug)
    {
        $Berita = Berita::where('slug',$slug)->first();
        if ($Berita != NULL) {
            $RelatedPost = Berita::with(['User', 'kategoriBerita'])->inRandomOrder()->limit(4)->get();
            $next = Berita::with(['User', 'kategoriBerita'])->where('id', '>', $Berita->id)->orderBy('id', 'desc')->first();
            $previous = Berita::with(['User', 'kategoriBerita'])->where('id', '<', $Berita->id)->orderBy('id', 'desc')->first();

            visitor()->visit($Berita);
            // $Berita->createVisitLog();
            return view('tlandingpage.detailBerita', compact('Berita', 'RelatedPost', 'next', 'previous'));
        } else {
            return back();
        }
    }

    public function cariBerita(Request $request)
    {
        $Berita = Berita::with(['User', 'kategoriBerita'])
            ->where('judul', 'LIKE', "%{$request->berita}%")->paginate(4);
        $RelatedPost = Berita::with(['User', 'kategoriBerita'])->inRandomOrder()->limit(4)->get();
        $dataPopuler = Visit::select('visitable_id', DB::raw('count(id) as total'))
            ->groupBy('visitable_id')
            ->orderBy('total', 'DESC')
            ->limit(4)->get();
        $Populer = Berita::whereIn('id', $dataPopuler->pluck('visitable_id')->toArray())->get();
        return view('tlandingpage.berita', compact('Berita', 'RelatedPost', 'Populer'));
    }

    public function detailPengumuman(Request $request, $slug)
    {
        $Pengumuman = Pengumuman::where('slug', $slug)->first();
        $BeritaBaru = Berita::with(['User', 'kategoriBerita'])->latest()->paginate(4);
        $dataPopuler = Visit::select('visitable_id', DB::raw('count(id) as total'))
            ->groupBy('visitable_id')
            ->orderBy('total', 'DESC')
            ->limit(4)->get();
        $Populer = Berita::whereIn('id', $dataPopuler->pluck('visitable_id')->toArray())->get();
        if ($Pengumuman != NULL) {
            return view('tlandingpage.detailPengumuman', compact('Pengumuman', 'BeritaBaru', 'Populer'));
        } else {
            return back();
        }
    }
}
