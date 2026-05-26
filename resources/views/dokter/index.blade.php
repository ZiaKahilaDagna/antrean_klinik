@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Index Dokter</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Spesialis</th>
                            <th>Nomor Telp</th>
                            <th>
                                <a href="{{ route('dokter.create') }}" class="btn btn-success btn-sm">
                                    + Create Dokter
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dokter as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->spesialis->name ?? '-' }}</td>
                            <td>{{ $v->no_hp }}</td>
                            <td>
                                <form action="{{ route('dokter.destroy', $v->id) }}" method="POST" style="display:inline-block">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    
                                    <a href="{{ route('dokter.edit', $v->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus dokter {{ $v->name }}?')">
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