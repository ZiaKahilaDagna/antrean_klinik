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
                        <a href="{{ route('jadwal.create') }}">+ Create Jadwal</a>
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
                        <form action="{{ route('jadwal.destroy', $v->id) }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <a href="{{ route('jadwal.edit', $v->id) }}">Edit</a>
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this jadwal?')">
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