@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Edit Pasien</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pasien.update', $dataeditpasien->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                    
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="name" class="form-control" value="{{ $dataeditpasien->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="address" class="form-control" value="{{ $dataeditpasien->address }}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $dataeditpasien->email }}">
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $dataeditpasien->no_hp }}" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L" {{ $dataeditpasien->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $dataeditpasien->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Ubah
                    </button>
                    <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection