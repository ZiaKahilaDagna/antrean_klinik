@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Index Pasien</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Nomor Telp</th>
                    <th>Jenis Kelamin</th>
                    <th>
                        <a href="{{ route('pasien.create') }}">+ Create Pasien</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasien as $v)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->address }}</td>
                    <td>{{ $v->email }}</td>
                    <td>{{ $v->no_hp }}</td>
                    <td>
                        {{ $v->jenis_kelamin == 'L' ? 'Laki-laki' : ($v->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}
                    </td>
                    <td>
                        <form action="{{ route('pasien.destroy', $v->id) }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <a href="{{ route('pasien.edit', $v->id) }}">Edit</a>
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this pasien?')">
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