<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = md5($request->input('password'));

        $akun = Akun::where('email', $email)->where('password', $password)->first();

        if ($akun) {
            $request->session()->put('id', $akun->id);
            $request->session()->put('jenis', $akun->jenis_akun_id);
            return redirect('/dashboard');
        } else {
            return back()->withErrors('Email atau password salah');
        }
    }

    public function logout(Request $request)
{
    // Logout pengguna
    Auth::logout();

    // Hapus semua session yang terkait dengan pengguna
    $request->session()->invalidate();

    // Regenerasi token CSRF untuk keamanan
    $request->session()->regenerateToken();

    // Redirect ke halaman login atau halaman utama
    return redirect('/login');
}

}
