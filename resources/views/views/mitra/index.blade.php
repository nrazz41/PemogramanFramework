
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
                        <li class="breadcrumb-item active" aria-current="page">Mitra</li>
                    </ol>
                </nav>
                <h2 class="h4">Data Mitra</h2>

                <p class="mb-0">List daftar Mitra yang menggunakan jasa Hengker.</p>
                @if (session('success'))
                    <div class="notification">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="btn-toolbar mb-2 mb-md-0"><a href="{{ route('mitra.create') }}"
                    class="btn btn-sm btn-success text-white d-inline-flex align-items-center"><svg
                        class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> Tambah Data</a>
                <div class="btn-group ms-2 ms-lg-3"><button type="button"
                        class="btn btn-sm btn-outline--600">Share</button> <button type="button"
                        class="btn btn-sm btn-outline-gray-600">Export</button></div>
            </div>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start">Mitra ID</th>
                                <th class="border-0">Nama Mitra</th>
                                <th class="border-0">Alamat</th>
                                <th class="border-0">Email</th>
                                <th class="border-0">Nomor Telepon</th>
                                <th class="border-0">Jenis Kemitraan</th>
                                <th class="border-0">Tanggal Bergabung</th>
                                <th class="border-0 rounded-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataMitra as $row)
                                <tr>
                                    <td>{{ $row->mitra_id }}</td>
                                    <td>{{ $row->nama_mitra }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->nomor_telepon }}</td>
                                    <td>
                                        @if($row->jenis_kemitraan == 'Gold')
                                            <span class="badge badge-warning">Gold</span>
                                        @elseif($row->jenis_kemitraan == 'Silver')
                                            <span class="badge badge-secondary">Silver</span>
                                        @elseif($row->jenis_kemitraan == 'Bronze')
                                            <span class="badge badge-danger">Bronze</span>
                                        @else
                                            <span class="badge badge-info">{{ $row->jenis_kemitraan }}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($row->tanggal_bergabung)->format('d-M-Y') }}</td>

                                    <td>
                                        <a href="{{ route('mitra.edit', $row->mitra_id) }}" class="btn btn-info btn-sm">
                                            <svg class="icon icon-xs me-2" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path>
                                            </svg>
                                            Edit
                                        </a>
                                        <a href="{{ route('mitra.destroy', $row->mitra_id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <svg class="icon icon-xs me-2" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12h.01M9 12h.01m4 0h.01m-7-6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V6zm-1 0h10"></path>
                                            </svg>
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

{{--end content--}}
@endsection
