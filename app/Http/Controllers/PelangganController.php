<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelangganController extends Controller
{
    public function index()
    {
        $pagedata['dataPelanggan'] = Pelanggan::all();
        Pelanggan::where('gender','male',$pagedata);
        return view('admin.pelanggan.index', $pagedata);
    }

    public function create()
    {
        return view('admin.pelanggan.create');
    }

    public function store(request $request)
    {
        // return view('admin.pelanggan.store');
        // dd($request->all());
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'birthday' => ['required', 'date'],
            'gender' => ['required', 'in:female,male'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
        ]);

        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['birthday'] = $request->birthday;
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        Pelanggan::create($data);

        return redirect()->route('pelanggan.list')->with('success','Penambahan Data Berhasil!');
    }

    // public function edit($param1)
    // {
    //     $pagedata = Pelanggan::findOrFail($param1); // Mengambil data pelanggan berdasarkan ID
    //     return view('admin.pelanggan.edit', $pagedata); // Mengirim data ke view edit
    // }
    public function edit($param1)
    {
        // Cari pelanggan berdasarkan ID
        $dataPelanggan = Pelanggan::findOrFail($param1);
        return view('admin.pelanggan.edit', compact('dataPelanggan'));
    }

    // Method update untuk menyimpan perubahan data pelanggan
    public function update(Request $request, $param1)
    {
    $request->validate([
        'pelanggan_id' => ['required'],
        'first_name' => ['required'],
        'last_name' => ['required'],
        'birthday' => ['required', 'date'],
        'gender' => ['required','in:male,female'],
        'email' => ['required', 'email'],
        'phone' => ['required', 'numeric'],
    ]);

    // Cari data pelanggan berdasarkan ID
    $pelanggan = Pelanggan::findOrFail($request->pelanggan_id);

    // Update data pelanggan
    $pelanggan->first_name = $request->first_name;
    $pelanggan->last_name = $request->last_name;
    $pelanggan->birthday = $request->birthday;
    $pelanggan->gender = $request->gender;
    $pelanggan->email = $request->email;
    $pelanggan->phone = $request->phone;

    // Simpan perubahan
    $pelanggan->save();

    // Redirect ke halaman list pelanggan dengan pesan sukses
    return redirect()->route('pelanggan.list')->with('success', 'Perubahan Data Berhasil!');
}
    // Method destroy untuk menghapus data pelanggan
    public function destroy($param1)
    {
        // Cari pelanggan berdasarkan ID dan hapus
        $pelanggan = Pelanggan::findOrFail($param1);
        $pelanggan->delete();

        // Redirect ke halaman daftar pelanggan dengan pesan sukses
        return redirect()->route('pelanggan.list')->with('success', 'Data Pelanggan Berhasil Dihapus!');
    }
}
