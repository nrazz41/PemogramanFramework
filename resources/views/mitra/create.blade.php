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
                        <li class="breadcrumb-item"><a href="{{ route('mitra.list') }}">Mitra</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Mitra</li>
                    </ol>
                </nav>
                <h2 class="h4">Tambah Mitra</h2>
                <p class="mb-0">Tambahkan List daftar Mitra yang menggunakan jasa Hengker.</p>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0"><a href="{{ route('pelanggan.list') }}"
                    class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"> Kembali</a>
                <div class="btn-group ms-2 ms-lg-3"><button type="button"
                        class="btn btn-sm btn-outline--600">Share</button> <button type="button"
                        class="btn btn-sm btn-outline-gray-600">Export</button></div>
            </div>
        </div>
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Tambah Mitra</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('mitra.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_mitra">Nama Mitra</label>
                        <input class="form-control" id="nama_mitra" name="nama_mitra" type="text" maxlength="200" required value="{{ old('nama_mitra') }}" placeholder="Masukkan nama mitra">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" maxlength="50" required value="{{ old('email') }}" placeholder="name@company.com" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input class="form-control" id="nomor_telepon" name="nomor_telepon" type="tel" required value="{{ old('nomor_telepon') }}" placeholder="Masukkan nomor telepon" pattern="^\d+$">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tanggal_bergabung">Tanggal Bergabung</label>
                        <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" required value="{{ old('tanggal_bergabung') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat mitra">{{ old('alamat') }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kemitraan">Jenis Kemitraan</label>
                        <select class="form-select" id="jenis_kemitraan" name="jenis_kemitraan" required>
                            <option disabled selected>Pilih jenis kemitraan</option>
                            <option value="Platinum" {{ old('jenis_kemitraan') == 'Platinum' ? 'selected' : '' }}>Platinum</option>
                            <option value="Gold" {{ old('jenis_kemitraan') == 'Gold' ? 'selected' : '' }}>Gold</option>
                            <option value="Silver" {{ old('jenis_kemitraan') == 'Silver' ? 'selected' : '' }}>Silver</option>
                        </select>
                    </div>
                </div>

                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="validCheckbox" name="validCheckbox" {{ old('validCheckbox') ? 'checked' : '' }} required>
                    <label class="form-check-label" for="validCheckbox">
                        Data ini benar dan dapat dipertanggungjawabkan dengan semestinya
                    </label>
                </div>

                <div class="mt-3">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Tambah Mitra</button>
                </div>
            </form>
        </div>
        {{--end content--}}
@endsection

