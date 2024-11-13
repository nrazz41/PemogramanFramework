<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MitraController extends Controller
{
    public function index()
    {
        $pagedata['dataMitra'] = Mitra::all();
        return view('mitra.index', $pagedata);
    }
    public function create()
    {
        return view('mitra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mitra' => ['required', 'max:200'],
            'alamat' => ['nullable'],
            'email' => ['required', 'email', 'unique:mitras,email'],
            'nomor_telepon' => ['required', 'numeric'],
            'jenis_kemitraan' => ['required', 'in:Platinum,Gold,Silver'],
            'tanggal_bergabung' => ['required', 'date'],
            'valid_checkbox' => ['nullable'],
        ]);

        $data['nama_mitra'] = $request->nama_mitra;
        $data['alamat'] = $request->alamat;
        $data['email'] = $request->email;
        $data['nomor_telepon'] = $request->nomor_telepon;
        $data['jenis_kemitraan'] = $request->jenis_kemitraan;
        $data['tanggal_bergabung'] = $request->tanggal_bergabung;

        Mitra::create($data);

        return redirect()->route('mitra.list')->with('success', 'Penambahan Data Mitra Berhasil!');
    }

    // Method edit untuk menampilkan form edit data mitra
    public function edit($id)
    {
        $dataMitra = Mitra::findOrFail($id);
        return view('mitra.edit', compact('dataMitra'));
    }

    // Method update untuk menyimpan perubahan data mitra
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mitra' => 'required|max:200',
            'alamat' => 'nullable',
            'email' => 'required|email|max:50|unique:mitras,email,' . $id . ',mitra_id',
            'nomor_telepon' => 'required|numeric',
            'jenis_kemitraan' => 'required|in:Platinum,Gold,Silver',
            'tanggal_bergabung' => 'required|date',
        ]);

        $mitra = Mitra::findOrFail($id);
        $mitra->update($request->all());

        return redirect()->route('mitra.list')->with('success', 'Perubahan Data Mitra Berhasil!');
    }

    // Method destroy untuk menghapus data mitra
    public function destroy($param1)
    {
        $mitra = Mitra::findOrFail($param1);
        $mitra->delete();

        return redirect()->route('mitra.list')->with('success', 'Data Mitra Berhasil Dihapus!');
    }
}
