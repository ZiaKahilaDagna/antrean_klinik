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
                        <a href="{{ route('dokter.create') }}">+ Create Dokter</a>
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
                        <form action="{{ route('dokter.destroy', $v->id) }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <a href="{{ route('dokter.edit', $v->id) }}">Edit</a>
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this dokter?')">
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