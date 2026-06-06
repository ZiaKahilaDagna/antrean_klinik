@extends('template/layout')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3><i class="fas fa-info-circle"></i> Detail Antrian</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="200">Kode Antrian</th>
                        <td>{{ $antrian->kode_antrian }}</td>
                    </tr>
                    <tr>
                        <th>Pasien</th>
                        <td>{{ $antrian->pasien->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Keluhan</th>
                        <td>{{ $antrian->keluhan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge badge-{{ $antrian->status == 'menunggu' ? 'warning' : ($antrian->status == 'dipanggil' ? 'info' : 'success') }}">
                                {{ $antrian->status }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Waktu Daftar</th>
                        <td>{{ $antrian->waktu_daftar ? date('d-m-Y H:i:s', strtotime($antrian->waktu_daftar)) : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Panggil</th>
                        <td>{{ $antrian->waktu_panggil ? date('d-m-Y H:i:s', strtotime($antrian->waktu_panggil)) : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Dokter</th>
                        <td>{{ $antrian->dokter->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jadwal</th>
                        <td>
                            @if($antrian->jadwal)
                                {{ $antrian->jadwal->hari }} ({{ substr($antrian->jadwal->jam_mulai, 0, 5) }} - {{ substr($antrian->jadwal->jam_selesai, 0, 5) }})
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $antrian->created_at ? date('d-m-Y H:i:s', strtotime($antrian->created_at)) : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Update</th>
                        <td>{{ $antrian->updated_at ? date('d-m-Y H:i:s', strtotime($antrian->updated_at)) : '-' }}</td>
                    </tr>
                </table>

                <div class="mt-3">
                    <a href="{{ route('admin.antrian.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    
                    <a href="{{ route('admin.antrian.edit', $antrian->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    
                    @if($antrian->status == 'menunggu')
                        <form action="{{ route('admin.antrian.panggil', $antrian->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success" onclick="return confirm('Panggil pasien?')">
                                <i class="fas fa-phone"></i> Panggil Pasien
                            </button>
                        </form>
                    @endif
                    
                    <form action="{{ route('admin.antrian.destroy', $antrian->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus antrian ini?')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection