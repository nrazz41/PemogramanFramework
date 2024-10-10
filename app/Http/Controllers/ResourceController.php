<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return '<h1>Daftar Pegawai</h1>';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(String $param1, $param2)
    {
        return 'Nama: '. $param1 . ' Alamat: '. $param2;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $param1)
    {
        return 'Data pegawai ID= '. $param1;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( string $param1)
    {
        return 'perubahan data pegawai milik ID '.$param1;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        return 'Hapus data pegawai yang memiliki ID =' .$param1;
    }
}
