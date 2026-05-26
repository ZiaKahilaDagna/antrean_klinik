@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>halaman index antrian</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Antrian</th>
                            <th>Nama Pasien</th>
                            <th>Nama Dokter</th>
                            <th>Jadwal</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                            <th>Waktu Daftar</th>
                            <th>Waktu Panggil</th>
                            <th>
                                <a href="{{ route('antrian.create') }}" class="btn btn-sm btn-success">
                                    + Create Antrian
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($antrian as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->kode_antrian }}</td>
                            <td>{{ $v->pasien->name ?? '-' }}</td>
                            <td>{{ $v->dokter->name ?? '-' }}</td>
                            <td>
                                @if($v->jadwal)
                                    {{ $v->jadwal->hari }} ({{ $v->jadwal->jam_mulai }} - {{ $v->jadwal->jam_selesai }})
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $v->keluhan }}</td>
                            <td>
                                @php
                                    $badgeColor = 'secondary';
                                    if($v->status == 'menunggu') $badgeColor = 'warning';
                                    if($v->status == 'dipanggil') $badgeColor = 'info';
                                    if($v->status == 'selesai') $badgeColor = 'success';
                                    if($v->status == 'batal') $badgeColor = 'danger';
                                @endphp
                                <span class="badge badge-{{ $badgeColor }}">
                                    {{ $v->status }}
                                </span>
                            </td>
                            <td>{{ $v->waktu_daftar ? \Carbon\Carbon::parse($v->waktu_daftar)->format('H:i:s') : '-' }}</td>
                            <td>{{ $v->waktu_panggil ? \Carbon\Carbon::parse($v->waktu_panggil)->format('H:i:s') : '-' }}</td>
                            <td>
                                {{-- TOMBOL PANGGIL (hanya muncul jika status menunggu) --}}
                                @if($v->status == 'menunggu')
                                    <form action="{{ route('antrian.panggil', $v->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Panggil pasien {{ $v->pasien->name ?? '-' }}?')">
                                            🛎️ Panggil
                                        </button>
                                    </form>
                                @endif

                                {{-- TOMBOL EDIT --}}
                                <a href="{{ route('antrian.edit', $v->id) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                {{-- TOMBOL DELETE --}}
                                <form action="{{ route('antrian.destroy', $v->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this antrian?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
@endsection