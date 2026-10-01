@extends('layouts.app')

@section('title', 'List Kartu Gantung')

@section('page-title')
    List Kartu Gantung
@endsection

@section('content')

    {{-- Search & Filter --}}
    <div class="card p-3 mb-3">
        <form method="GET" action="{{ url('/kartu-gantung') }}">
            <div class="row g-2 align-items-center">
                <div class="col-md-4">
                    <input type="text" name="search" value="{{ request('search') }}"
                           class="form-control" placeholder="Cari kode barang / nama barang / kode lokasi">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
                <div class="col-md-3 ms-auto text-end">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#filterPanel">
                        Filter
                    </button>
                </div>
            </div>

            <div class="collapse mt-3" id="filterPanel">
                <div class="row g-2">
                    <div class="col-md-3">
                        <select name="regional" class="form-select">
                            <option value="">Semua Regional</option>
                            @foreach($regionals ?? [] as $r)
                                <option value="{{ $r }}" {{ request('regional') == $r ? 'selected' : '' }}>{{ $r }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="plant" class="form-select">
                            <option value="">Semua Plant</option>
                            @foreach($plants ?? [] as $p)
                                <option value="{{ $p }}" {{ request('plant') == $p ? 'selected' : '' }}>{{ $p }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="kategori" class="form-select">
                            <option value="">Semua Kategori</option>
                            @foreach($kategoris ?? [] as $k)
                                <option value="{{ $k }}" {{ request('kategori') == $k ? 'selected' : '' }}>{{ $k }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="storage_location" class="form-select">
                            <option value="">Semua Storage Location</option>
                            @foreach($storageLocations ?? [] as $s)
                                <option value="{{ $s }}" {{ request('storage_location') == $s ? 'selected' : '' }}>{{ $s }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Jumlah hasil --}}
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div class="text-muted">
            <strong>{{ count($rows ?? []) }}</strong> hasil ditemukan
        </div>
        <a href="{{ url('/kartu-gantung/export') }}" class="btn btn-sm btn-outline-success">Export</a>
    </div>

    {{-- Tabel --}}
    <div class="card">
        @if(empty($rows))
            <div class="text-center text-muted py-5">Data belum tersedia.</div>
        @else
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Lokasi</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Brand</th>
                            <th>Plant</th>
                            <th>Storage Location</th>
                            <th>Stok</th>
                            <th>Petugas Update</th>
                            <th>Tanggal Update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $i => $row)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $row['kode_lokasi'] }}</td>
                                <td>{{ $row['kode_barang'] }}</td>
                                <td>{{ $row['nama'] }}</td>
                                <td>{{ $row['kategori'] }}</td>
                                <td>{{ $row['brand'] }}</td>
                                <td>{{ $row['plant'] }}</td>
                                <td>{{ $row['storage'] }}</td>
                                <td>
                                    <span class="badge {{ $row['stok'] <= 5 ? 'bg-warning text-dark' : 'bg-success' }}">
                                        {{ $row['stok'] }} {{ $row['satuan'] }}
                                    </span>
                                </td>
                                <td>{{ $row['petugas'] }}</td>
                                <td>{{ $row['tanggal'] }}</td>
                                <td>
                                    <a href="{{ url('/kartu-gantung/'.$row['kode_barang']) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                                    <a href="{{ url('/kartu-gantung/'.$row['kode_barang'].'/edit') }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus kartu ini?')">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
