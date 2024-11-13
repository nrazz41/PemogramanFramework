<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produk',  function (Blueprint $table) {
            $table->increments('produk_id');
            $table->string('nama_produk', 200)->nullable(false);
            $table->text('deskripsi')->nullable();
            $table->string('harga')->nullable(false);
            $table->string('stok')->nullable(false);
            $table->enum('jenis_produk', ['Makanan', 'Minuman', 'Kerajinan'])->nullable(false);
            $table->date('tanggal_exp')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
};

