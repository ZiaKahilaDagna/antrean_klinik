@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Index Spesialis</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>
                                <a href="{{ route('admin.spesialis.create') }}" class="btn btn-success btn-sm">
                                    + Tambah Spesialis
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spesialis as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->name }}</td>
                            <td>
                                <form action="{{ route('admin.spesialis.destroy', $v->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <a href="{{ route('admin.spesialis.edit', $v->id) }}" class="btn btn-warning btn-sm">
                                        Ubah
                                    </a>
                                    
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this spesialis?')">
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