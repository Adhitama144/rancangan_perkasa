<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Guid\Guid;
use App\Models\Akun;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register');
    }

    public function register (Request $request)
    {
        // Validasi data yang dikirim
        // $request->validate([
        //     'email' => 'required|email',
        //     'no_wa' => 'required|max_digits:13|min_digits:10',
        //     'password' => 'required|min:8',
        //     'nama' => 'required|max:128|min:3',
        //     'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
        //     'alamat' => 'required',
        // ]);

        // Ambil data dari form
        $id = (string) Guid::uuid4();
        $email = $request->input('email');
        $no_wa = substr($request->input('no_wa'), 1);
        $password = md5($request->input('password'));
        $nama = $request->input('nama');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $alamat = $request->input('alamat');
        $jenis_akun_id = 'umum';

        // Simpan data ke database
        $Akun_baru = new Akun();
        $Akun_baru->id = $id;
        $Akun_baru->email = $email;
        $Akun_baru->no_wa = $no_wa;
        $Akun_baru->password = $password;
        $Akun_baru->nama = $nama;
        $Akun_baru->jenis_kelamin = $jenis_kelamin;
        $Akun_baru->alamat = $alamat;
        $Akun_baru->jenis_akun_id = $jenis_akun_id;

        $emailExists = Akun::where('email', $email)->exists();
        $noWaExists = Akun::where('no_wa', $no_wa)->exists();

        if ($emailExists) {
            return back()->withErrors('Email sudah terdaftar');
        } elseif ($noWaExists) {
            return back()->withErrors('No WA sudah terdaftar');
        }

        if ($Akun_baru->save()) {
            $request->session()->put('id', $id);
            $request->session()->put('jenis', $jenis_akun_id);
            return redirect('/dashboard');
        } else {
            return back()->withErrors('Terjadi kesalahan, silakan coba lagi');
        }
    }
}
