
@extends('layouts.admin.app')
@section('content')
{{--main content--}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="#"><svg class="icon icon-xxs" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pelanggan.list') }}">Produk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Produk</li>
                    </ol>
                </nav>
                <h2 class="h4">Edit Produk</h2>
                <p class="mb-0">Form perubahan data Produk.</p>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0"><a href="{{ route('pelanggan.list') }}"
                    class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"> Kembali</a>
            </div>
        </div>

        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Form Perubahan Data Produk</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('produk.update', $dataProduk->produk_id) }}" method="POST">
                @csrf


                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_produk">Nama Produk</label>
                        <input class="form-control" id="nama_produk" name="nama_produk" type="text"
                            value="{{ $dataProduk->nama_produk }}" required maxlength="200">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="stok">Stok Produk</label>
                        <input class="form-control" id="stok" name="stok" type="stok"
                            value="{{ $dataProduk->stok }}" required pattern="\d*">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi">Deskripsi Produk</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $dataProduk->deskripsi }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="harga">Harga Produk</label>
                        <input class="form-control" id="harga" name="harga" type="harga"
                            value="{{ $dataProduk->harga }}" required maxlength="50">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="jenis_produk">Jenis Produk</label>
                        <select class="form-select mb-0" id="jenis_produk" name="jenis_produk" required>
                            <option disabled>Select Jenis Produk</option>
                            <option value="Makanan" {{ $dataProduk->jenis_produk == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="Minuman" {{ $dataProduk->jenis_produk == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="Kerajinan" {{ $dataProduk->jenis_produk == 'Kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tanggal_exp">Tanggal Expired</label>
                    <input type="date" class="form-control" id="tanggal_exp" name="tanggal_exp"
                        value="{{ $dataProduk->tanggal_exp }}" required>
                </div>

                <div class="mt-3">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Update Data</button>
                </div>
                <input type="hidden" name="produk_id" value="{{ $dataProduk->produk_id }}"/>
            </form>
        </div>
{{--end content--}}
@endsection

