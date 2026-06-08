@extends('dokter/template/layout')
@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3>Daftar Antrian</h3>
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
                @forelse($antrian as $key => $item)
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
                    <td colspan="6" class="text-center">Belum ada antrian</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection