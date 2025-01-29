<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request) {
        $id = $request->session()->get("id");

        $profile = Akun::where('id', $id)->first();

        $data = [
            'profile' => $profile,
        ];

        return view('profile', $data);
    }

    public function edit(Request $request)
    {
        $id = $request->session()->get("id");
        $nama = $request->input('nama');
        $email = $request->input('email');
        $no_wa = $request->input('no_wa');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $alamat = $request->input('alamat');

        $akun = Akun::where('id', $id)->first();

        if (!$akun) {
            return back()->withErrors('Akun tidak ditemukan');
        }

        $akun->nama = $nama;
        $akun->email = $email;
        $akun->no_wa = $no_wa;
        $akun->jenis_kelamin = $jenis_kelamin;
        $akun->alamat = $alamat;

        if ($akun->save()) {
            return back();
        }
    }

    public function sandiLama(Request $request) {
        $id = $request->session()->get("id");
        $sandi_lama = md5($request->input('sandilama'));
        $sandi_baru = md5($request->input('sandibaru'));
        $konfirmasi_sandi = md5($request->input('konfirmasisandi'));

        $akun = Akun::where('id', $id)->first();

        if (!$akun) {
            return back()->withErrors('Akun tidak ditemukan');
        }

        if ($akun->password != $sandi_lama) {
            return back()->withErrors('Sandi lama salah');
        }

        if ($sandi_baru != $konfirmasi_sandi) {
            return back()->withErrors('Konfirmasi sandi salah');
        }

        $akun->password = $sandi_baru;

        if ($akun->save()) {
            return back();
        }
    }
}
