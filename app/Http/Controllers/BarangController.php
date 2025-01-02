<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('kategori')->get();
        $kategori = Kategori::all();

        $data = [
            'barang' => $barang,
            'kategori' => $kategori,
        ];

        return view('barang', $data);
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|integer',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = new Barang();
        $barang->nama_barang = $request->input('nama_barang');
        $barang->kategori = $request->input('kategori');
        $barang->harga = $request->input('harga');
        $barang->stok = $request->input('stok');


        if ($request->hasFile('foto')) {
            $barang->foto = $request->file('foto')->store('uploads/foto_barang', 'public');
        }

        if ($barang->save()) {
            return redirect()->back()->with('success', 'Barang berhasil ditambahkan.');
        }

        return redirect()->back()->withErrors('Gagal menambahkan barang.');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|integer',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->back()->withErrors('Barang tidak ditemukan.');
        }

        $barang->nama_barang = $request->input('nama_barang');
        $barang->kategori = $request->input('kategori');
        $barang->harga = $request->input('harga');
        $barang->stok = $request->input('stok');

        if ($request->hasFile('foto')) {
            if ($barang->foto) {
                Storage::disk('public')->delete($barang->foto);
            }
            $barang->foto = $request->file('foto')->store('uploads/foto_barang', 'public');
        }

        if ($barang->save()) {
            return redirect()->back()->with('success', 'Barang berhasil diperbarui.');
        }

        return redirect()->back()->withErrors('Gagal memperbarui barang.');
    }

    public function hapus(Request $request, $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->back()->withErrors('Barang tidak ditemukan.');
        }

        if ($barang->foto) {
            Storage::disk('public')->delete($barang->foto);
        }

        if ($barang->delete()) {
            return redirect()->back()->with('success', 'Barang berhasil dihapus.');
        }

        return redirect()->back()->withErrors('Gagal menghapus barang.');
    }
}
