<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PinjamBukuController extends Controller
{
    function ajukan(string $param1){
        echo 'Peminjaman Buku IT berhasil. ID: '. $param1;
    }
}
