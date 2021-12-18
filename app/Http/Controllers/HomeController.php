<?php

namespace App\Http\Controllers;

use App\Models\ArsipPost;
use App\Models\GuruModel;
use App\Models\Murid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::count();
        $guru = GuruModel::count();
        $arsip = ArsipPost::count();
        $murid = Murid::count();

        return view('home', compact('user', 'guru', 'arsip', 'murid'));
    }

    public function changePass(Request $request)
    {
        $user = Auth::user();
        $data = User::findOrFail($user->id);
        $data->password = Hash::make($request->password);
        $data->save();

        return redirect()->route('home')->with(['success' => 'Password Berhasil Dirubah']);
    }
}
