<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->increments('mitra_id');
            $table->string('nama_mitra', 200)->nullable(false);
            $table->text('alamat')->nullable();
            $table->string('email', 50)->unique()->nullable(false);
            $table->string('nomor_telepon')->nullable(false);
            $table->enum('jenis_kemitraan', ['Platinum', 'Gold', 'Silver'])->nullable(false);
            $table->date('tanggal_bergabung')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mitras');
    }
};
