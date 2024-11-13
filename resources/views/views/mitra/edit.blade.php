@extends('layouts.admin.app')
@section('content')
    {{-- main content --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item"><a href="#"><svg class="icon icon-xxs" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pelanggan.list') }}">Mitra</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                </ol>
            </nav>
            <h2 class="h4">Edit Mitra</h2>
            <p class="mb-0">Form perubahan data Mitra yang menggunakan jasa Hengker.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0"><a href="{{ route('pelanggan.list') }}"
                class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"> Kembali</a>
        </div>
    </div>

    <div class="card card-body border-0 shadow mb-4">
        <h2 class="h5 mb-4">Form Perubahan Data Mitra</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('mitra.update', $dataMitra->mitra_id) }}" method="POST">
            @csrf


            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama_mitra">Nama Mitra</label>
                    <input class="form-control" id="nama_mitra" name="nama_mitra" type="text"
                        value="{{ $dataMitra->nama_mitra }}" required maxlength="200">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input class="form-control" id="nomor_telepon" name="nomor_telepon" type="tel"
                        value="{{ $dataMitra->nomor_telepon }}" required pattern="\d*">
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $dataMitra->alamat }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" value="{{ $dataMitra->email }}"
                        required maxlength="50">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jenis_kemitraan">Jenis Kemitraan</label>
                    <select class="form-select mb-0" id="jenis_kemitraan" name="jenis_kemitraan" required>
                        <option disabled>Select Jenis Kemitraan</option>
                        <option value="Platinum" {{ $dataMitra->jenis_kemitraan == 'Platinum' ? 'selected' : '' }}>Platinum
                        </option>
                        <option value="Gold" {{ $dataMitra->jenis_kemitraan == 'Gold' ? 'selected' : '' }}>Gold</option>
                        <option value="Silver" {{ $dataMitra->jenis_kemitraan == 'Silver' ? 'selected' : '' }}>Silver
                        </option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="tanggal_bergabung">Tanggal Bergabung</label>
                <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung"
                    value="{{ $dataMitra->tanggal_bergabung }}" required>
            </div>

            <div class="mt-3">
                <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Update Data</button>
            </div>
            <input type="hidden" name="mitra_id" value="{{ $dataMitra->mitra_id }}" />
        </form>
    </div>
    {{-- end content --}}
@endsection
