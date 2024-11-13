<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PercobaanController;
use App\Http\Controllers\PinjamBukuController;

Route::get('/', function () {
    return 'Selamat Datang Website';
});

// Route::get('/pegawai/{param1}', function (string $params1) {
//     return 'ID pegawai: '.$params1;
// });

// Route::get('/pegawai/{param1?}', function (string $param1='') {
//     if($param1){
//         $enc_id = encrypt($param1);
//     return 'ID '.$param1;
// } else {
//       echo view('pegawai');
//     }
// });

// Route::get('/jabatan_struktural/store', function () {
//     return 'Silahkan pilih jabatan';
// })->name('jabstruk.store');

Route::get('/time', function () {
    $currentTime = date('d-m-Y H:i:s');
    return "Waktu saat ini adalah: $currentTime";
});

// Route::get('/param/{param1?}/{param2?}', function (string $param1='', $param2='') {
//     if ($param1 == 0) {
//         return 'Parameter 1: '.$param2;
//     } elseif ($param2 == 0) {
//         return 'Parameter 2: '.$param1;
//     } elseif ($param1 != 0 && $param2 != 0) {
//         $result = $param1 * $param2;
//         return 'Hasil perkalian: '.$result;
//     } elseif ($param1 == null && $param2 == null) {
//         return "Silahkan masuk parameter";
//     }
// });

Route::get('/calculate/{param1?}/{param2?}', function (string $param1='', string $param2='') {
    $param1 = request('param1', 0);
    $param2 = request('param2', 0);

    if ($param1 == 0 && $param2 == 0) {
        return "Silahkan masuk parameter";
    } elseif ($param1 == 0) {
        return $param2;
    } elseif ($param2 == 0) {
        return $param1;
    } else {
        return $param1 * $param2;
    }
});


Route::get('/pegawai/{param1}', [PegawaiController::class,'new']);

Route::get('/pinjambuku/{param1}', [PinjamBukuController::class,'ajukan']);

Route::get('/percobaan', [PercobaanController::class,'informasi']);

Route::get('/enkripsi/{param1}', [PercobaanController::class,'function2']);

Route::get('/random/{param1}/{param2}', [PercobaanController::class,'function3']);

Route::get('/pegawai1', [ResourceController::class,'index']);

Route::get('/alamat/{param1}/{param2}', [ResourceController::class,'store']);

Route::get('/id/{param1}', [ResourceController::class,'show']);

Route::get('/update/{param1}', [ResourceController::class,'update']);

Route::get('/delete/{param1}', [ResourceController::class,'destroy']);



Route::get('/home', [HomeController::class,'index']);


Route::post('/home/signup', [HomeController::class,'signup']);

Route::get('/auth', [AuthController::class,'index'])->name('halaman-login');

Route::post('/auth/login', [AuthController::class,'login'])->name('login');

Route::get('/home/{param1}', [HomeController::class,'redirectTo']);

Route::get('/auth', [AuthController::class,'index'])->name('halaman-login');

route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.list');

route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');

Route::post('pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');

Route::get('pelanggan/edit/{param1}', [PelangganController::class, 'edit'])->name('pelanggan.edit');

Route::post('pelanggan/{param1}/update', [PelangganController::class, 'update'])->name('pelanggan.update');

Route::get('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');


Route::get('mitra', [MitraController::class, 'index'])->name('mitra.list');

Route::get('buat', [MitraController::class, 'create'])->name('mitra.create');

Route::post('str', [MitraController::class, 'store'])->name('mitra.store');

Route::get('/edit/{param1}', [MitraController::class, 'edit'])->name('mitra.edit');

Route::get('/delete/{param1}', [MitraController::class, 'destroy'])->name('mitra.destroy');

Route::post('/mitra/update/{id}', [MitraController::class, 'update'])->name('mitra.update');


Route::get('/authadmin', [AuthController::class,'loginview'])->name('login.admin');

Route::post('/auth/loginadmin',[AuthController::class, 'loginadmin'])->name('login.dashboard');

route::get('produk', [ProdukController::class, 'index'])->name('produk.list');

route::get('buatproduk', [ProdukController::class, 'create'])->name('produk.create');

route::post('strproduk', [ProdukController::class, 'store'])->name('produk.store');

route::get('/editproduk/{param1}', [ProdukController::class, 'edit'])->name('produk.edit');

route::get('/deleteproduk/{param1}', [ProdukController::class, 'destroy'])->name('produk.destroy');

route::post('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');



route::get('/auth/forgot', [AuthController::class,'forgot'])->name('auth.forgot');
route::post('/auth/forgot/vali', [AuthController::class,'forgotvali'])->name('auth.vali');
