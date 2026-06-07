@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Index Jadwal</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokter</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>
                                <a href="{{ route('admin.jadwal.create') }}" class="btn btn-success btn-sm">
                                    + Tambah Jadwal
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->dokter->name ?? '-' }}</td>
                            <td>{{ $v->hari }}</td>
                            <td>{{ $v->jam_mulai }}</td>
                            <td>{{ $v->jam_selesai }}</td>
                            <td>
                                <form action="{{ route('admin.jadwal.destroy', $v->id) }}" method="POST" style="display:inline-block">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    
                                    <a href="{{ route('admin.jadwal.edit', $v->id) }}" class="btn btn-warning btn-sm">
                                        Ubah
                                    </a>
                                    
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jadwal dokter {{ $v->dokter->name ?? 'ini' }}?')">
                                        Hapus
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