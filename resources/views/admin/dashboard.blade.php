@extends('admin.template/layout')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3><i class="fas fa-tachometer-alt"></i> Dashboard Admin</h3>
            </div>
            <div class="card-body">
                <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>! Anda login sebagai <span class="badge badge-primary">Admin</span></p>
                <p>Selamat datang di sistem Antrian Klinik. Silakan kelola data melalui menu di samping.</p>
            </div>
        </div>
    </div>
</div>

<!-- Cards Statistik -->
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $spesialis ?? 0 }}</h3>
                <p>Spesialis</p>
            </div>
            <div class="icon">
                <i class="fas fa-stethoscope"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $dokter ?? 0 }}</h3>
                <p>Dokter</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-md"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $pasien ?? 0 }}</h3>
                <p>Pasien</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $antrian ?? 0 }}</h3>
                <p>Antrian Hari Ini</p>
            </div>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>
    </div>
</div>

{{-- SEMENTARA DI COMMENT DULU
<!-- Antrian Terbaru -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5><i class="fas fa-list"></i> Antrian Terbaru</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Antrian</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Status</th>
                            <th>Waktu Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($antrianTerbaru ?? [] as $item)
                        <tr>
                            <td>{{ $item->kode_antrian }}</td>
                            <td>{{ $item->pasien->name ?? '-' }}</td>
                            <td>{{ $item->dokter->name ?? '-' }}</td>
                            <td>
                                <span class="badge badge-{{ $item->status == 'menunggu' ? 'warning' : ($item->status == 'dipanggil' ? 'info' : 'success') }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>{{ $item->created_at->format('H:i:s') }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Detail</a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada antrian</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
--}}

<!-- Menu Cepat -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h5><i class="fas fa-plus-circle"></i> Menu Cepat</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 col-6 mb-2">
                        <a href="{{ route('admin.spesialis.create') }}" class="btn btn-outline-primary btn-block">
                            <i class="fas fa-plus"></i> Spesialis
                        </a>
                    </div>
                    <div class="col-md-2 col-6 mb-2">
                        <a href="{{ route('admin.dokter.create') }}" class="btn btn-outline-success btn-block">
                            <i class="fas fa-plus"></i> Dokter
                        </a>
                    </div>
                    <div class="col-md-2 col-6 mb-2">
                        <a href="{{ route('admin.pasien.create') }}" class="btn btn-outline-warning btn-block">
                            <i class="fas fa-plus"></i> Pasien
                        </a>
                    </div>
                    <div class="col-md-2 col-6 mb-2">
                        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-outline-info btn-block">
                            <i class="fas fa-plus"></i> Jadwal
                        </a>
                    </div>
                    <div class="col-md-2 col-6 mb-2">
                        <a href="{{ route('admin.antrian.create') }}" class="btn btn-outline-danger btn-block">
                            <i class="fas fa-plus"></i> Antrian
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection