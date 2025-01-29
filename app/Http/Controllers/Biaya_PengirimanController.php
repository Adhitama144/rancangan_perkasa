<?php

namespace App\Http\Controllers;

use App\Models\BiayaPengiriman;
use Illuminate\Http\Request;

class Biaya_PengirimanController extends Controller
{
    function index() {
        $biayaPengiriman = BiayaPengiriman::all();

        $data = [
            'biayaPengiriman' => $biayaPengiriman,
        ];
        
        return view('biaya_pengiriman', $data);        
    }

    public function tambah(Request $request)
    {
        $wilayah = $request->input('wilayah');
        $nominal = $request->input('nominal');
        
        $Biaya_Pengiriman = new BiayaPengiriman();
        $Biaya_Pengiriman->wilayah = $wilayah;
        $Biaya_Pengiriman->nominal = $nominal;

        if ($Biaya_Pengiriman->save()) {
            return back();
        }else{
            return back()->withErrors('Periksa kembali data anda');
        }
    }

    public function edit(Request $request)
    {
        $id = $request->input('id_edit');
        $wilayah = $request->input('wilayah_edit');
        $nominal = $request->input('nominal_edit');

        $biayaPengiriman = BiayaPengiriman::where('id', $id)->first();

        if (!$biayaPengiriman) {
            return back()->withErrors('Biaya Pengiriman tidak ditemukan');
        }

        $biayaPengiriman->wilayah = $wilayah;
        $biayaPengiriman->nominal = $nominal;

        if ($biayaPengiriman->save()) {
            return back();
        }
    }

    public function hapus(Request $request)
    {
        $id = $request->input('id_hapus');
        $biayaPengiriman = BiayaPengiriman::where('id',$id)->first();

        if (!$biayaPengiriman) {
            return back()->withErrors('Biaya Pengiriman tidak ditemukan');
        }

        if ($biayaPengiriman->delete()) {
            return back();
        }
    }
}
