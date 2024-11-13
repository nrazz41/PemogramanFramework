<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $primaryKey = 'produk_id';
    protected $table = 'produk'; // Sesuaikan primary key jika perlu
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'jenis_produk',
        'tanggal_exp'
    ];
}
