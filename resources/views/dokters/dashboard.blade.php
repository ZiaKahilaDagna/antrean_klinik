@extends('template/layout')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h3><i class="fas fa-tachometer-alt"></i> Dashboard Dokter</h3>
            </div>
            <div class="card-body">
                <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>! Anda login sebagai <span class="badge badge-success">Dokter</span></p>
                <p>Selamat datang di sistem Antrian Klinik.</p>
            </div>
        </div>
    </div>
</div>

<!-- Statistik -->
<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h3 class="mb-0">{{ $totalAntrian ?? 0 }}</h3>
                <p>Total Antrian</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h3 class="mb-0">{{ $antrianMenunggu ?? 0 }}</h3>
                <p>Menunggu</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h3 class="mb-0">{{ $antrianDipanggil ?? 0 }}</h3>
                <p>Dipanggil</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h3 class="mb-0">{{ $antrianSelesai ?? 0 }}</h3>
                <p>Selesai</p>
            </div>
        </div>
    </div>
</div>

<!-- Antrian Hari Ini -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5><i class="fas fa-list"></i> Antrian Hari Ini</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Pasien</th>
                            <th>Status</th>
                            <th>Waktu Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($antrianHariIni ?? [] as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->kode_antrian }}</td>
                            <td>{{ $item->pasien->name ?? '-' }}</td>
                            <td>
                                <span class="badge badge-{{ $item->status == 'menunggu' ? 'warning' : ($item->status == 'dipanggil' ? 'info' : 'success') }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>{{ $item->created_at->format('H:i:s') }}</td>
                            <td>
                                <a href="{{ route('dokter.antrian.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                @if($item->status == 'menunggu')
                                    <form action="{{ route('dokter.antrian.panggil', $item->id) }}" method="POST" style="display:inline">
                                        @csrf @method('PUT')
                                        <button class="btn btn-sm btn-success" onclick="return confirm('Panggil pasien?')">Panggil</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada antrian hari ini</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- HAPUS MENU CEPAT YANG ADA CREATE ANTRIAN --}}

@endsection