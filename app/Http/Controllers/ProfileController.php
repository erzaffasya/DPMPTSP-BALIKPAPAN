<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }
    public function ubahPassword(Request $request)
    {
        $user = User::find(Auth::id());
        $user->password = bcrypt($request->password);
        $user->save();
        return back()->with('success','Password Berhasil Diubah');
    }
}
