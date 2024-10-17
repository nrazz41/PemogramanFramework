<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $primatyKey = 'pelanggan_)id';
    protected $table = 'pelanggan';

    protected $fillable = [
        'first_name',
        'last_name',
        'bithday',
        'gender',
        'email',
        'phopne',
    ];
}
