<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Log;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        $data = [
            'kategori' => $kategori,
        ];

        return view('kategori', $data);
    }

    public function tambah(Request $request)
    {
        $nama_kategori = $request->input('nama_kategori');
        $ukuran = $request->input('ukuran');
        $satuan = $request->input('satuan');
        $biaya_sales = $request->input('biaya_sales');

        $kategoribaru = new Kategori();
        $kategoribaru->nama_kategori = $nama_kategori;
        $kategoribaru->ukuran = $ukuran;
        $kategoribaru->satuan = $satuan;
        $kategoribaru->biaya_sales = $biaya_sales;

        if ($kategoribaru->save()) {
            return back();
        }else{
            return back()->withErrors('Periksa kembali data anda');
        }

    }

    public function edit(Request $request)
    {
        $id = $request->input('id_edit');
        $nama_kategori = $request->input('nama_kategori_edit');
        $ukuran = $request->input('ukuran_edit');
        $satuan = $request->input('satuan_edit');
        $biaya_sales = $request->input('biaya_sales_edit');

        $kategori = Kategori::where('id', $id)->first();

        if (!$kategori) {
            return back()->withErrors('Kategori tidak ditemukan');
        }

        $kategori->nama_kategori = $nama_kategori;
        $kategori->ukuran = $ukuran;
        $kategori->satuan = $satuan;
        $kategori->biaya_sales = $biaya_sales;

        if ($kategori->save()) {
            return back();
        }
    }

    public function hapus(Request $request)
    {
        $id = $request->input('id_hapus');
        $kategori = Kategori::where('id',$id)->first();

        if (!$kategori) {
            return back()->withErrors('Kategori tidak ditemukan');
        }

        if ($kategori->delete()) {
            return back();
        }
    }
}
