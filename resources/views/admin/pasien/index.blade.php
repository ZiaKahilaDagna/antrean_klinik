@extends('admin.template/layout')
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
                                <a href="{{ route('admin.pasien.create') }}" class="btn btn-success btn-sm">
                                    + Tambah Pasien
                                </a>
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
                                @if($v->jenis_kelamin == 'L')
                                    Laki-laki
                                @elseif($v->jenis_kelamin == 'P')
                                    Perempuan
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.pasien.destroy', $v->id) }}" method="POST" style="display:inline-block">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    
                                    <a href="{{ route('admin.pasien.edit', $v->id) }}" class="btn btn-warning btn-sm">
                                        Ubah
                                    </a>
                                    
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pasien {{ $v->name }}?')">
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