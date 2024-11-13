<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProdukController extends Controller
{
    public function index()
    {
        $pagedata['dataProduk'] = Produk::all();
        return view('produk.index', $pagedata);
    }
    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => ['required', 'max:200'],
            'deskripsi' => ['nullable'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'jenis_produk' => ['required', 'in:Makanan,Minuman,Kerajinan'],
            'tanggal_exp' => ['required', 'date'],
            'valid_checkbox' => ['nullable'],
        ]);

        $data['nama_produk'] = $request->nama_produk;
        $data['deskripsi'] = $request->deskripsi;
        $data['harga'] = $request->harga;
        $data['stok'] = $request->stok;
        $data['jenis_produk'] = $request->jenis_produk;
        $data['tanggal_exp'] = $request->tanggal_exp;

        Produk::create($data);

        return redirect()->route('produk.list')->with('success', 'Penambahan Data Produk Berhasil!');
    }


    public function edit($id)
    {
        $dataProduk = Produk::findOrFail($id);
        return view('produk.edit', compact('dataProduk'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'nama_produk' => 'required|max:200',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'jenis_produk' => 'required|in:Makanan,Minuman,Kerajinan',
            'tanggal_exp' => 'required|date',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect()->route('produk.list')->with('success', 'Perubahan Data Produk Berhasil!');
    }

   
    public function destroy($param1)
    {
        $produk = Produk::findOrFail($param1);
        $produk->delete();

        return redirect()->route('produk.list')->with('success', 'Data Produk Berhasil Dihapus!');
    }
}
