<?php

use App\Helpers\Helper;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FastLinkController;
use App\Http\Controllers\HalamanMenuController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LinkTerkaitController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileWebsiteController;
use App\Http\Controllers\SurveyKepuasanController;
use App\Http\Controllers\TagBeritaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('tlandingpage.index');
// })->name('home');

// Route::get('/regular', function () {
//     return view('tlandingpage.regular');
// });

// Route::get('/detailBerita', function () {
//     return view('tlandingpage.detailBerita');
// });

// Route::get('/berita', function () {
//     return view('tlandingpage.berita');
// })->name('landingpage-berita');

Route::get('/kontak', function () {
    return view('tlandingpage.kontak');
})->name('kontak');

Route::get('/login2', function () {
    return view('tlandingpage.login');
});

//HalamanMenu
Route::get('detail/{id}', [LandingpageController::class, 'HalamanMenu'])->name('HalamanMenu');
Route::get('sub-menu/{id}', [MenuController::class, 'subMenu'])->name('sub-menu');
Route::get('berita', [LandingpageController::class, 'Berita'])->name('landingpage-berita');
Route::get('detail-berita/{id}', [LandingpageController::class, 'DetailBerita'])->name('detail-berita');
Route::get('detail-pengumuman/{id}', [LandingpageController::class, 'detailPengumuman'])->name('detail-pengumuman');
Route::post('cari-berita', [LandingpageController::class, 'cariBerita'])->name('cari-berita');
Route::get('/', [LandingpageController::class, 'home'])->name('home');



Route::group(['middleware' => 'auth'], function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.index');
    // });

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('setting-profile', [ProfileController::class, 'index'])->name('setting-profile');
    Route::put('ubah-password', [ProfileController::class, 'ubahPassword'])->name('ubah-password');
    Route::resource('KategoriBerita', KategoriBeritaController::class);
    Route::resource('TagBerita', TagBeritaController::class);
    Route::resource('LinkTerkait', LinkTerkaitController::class);
    Route::resource('Pelayanan', PelayananController::class);
    Route::resource('Berita', BeritaController::class);
    Route::resource('SurveyKepuasan', SurveyKepuasanController::class);
    Route::resource('Menu', MenuController::class);

    //Blom
    Route::resource('Pengumuman', PengumumanController::class);
    Route::resource('FastLink', FastLinkController::class);
    Route::resource('Banner', BannerController::class);
    Route::resource('ProfileWebsites', ProfileWebsiteController::class);

    Route::prefix('ProfileWebsite')->group(function () {
        Route::get('kepala-dinas', [ProfileWebsiteController::class, 'kepalaDinas'])->name('kepalaDinas');
        Route::get('profil-website', [ProfileWebsiteController::class, 'profilWebsite'])->name('profilWebsite');
        Route::get('kontak', [ProfileWebsiteController::class, 'kontak'])->name('kontaks');
        Route::get('sosial-media', [ProfileWebsiteController::class, 'sosialMedia'])->name('sosialMedia');
        Route::get('jadwal-pelayanan', [ProfileWebsiteController::class, 'jadwalPelayanan'])->name('jadwalPelayanan');
    });

    Route::resource('HalamanMenu', HalamanMenuController::class);
});
// Route::get('admin/cara-pemesanan', [GeneralController::class, 'pemesanan'])->name('pemesanan');

require __DIR__ . '/auth.php';
