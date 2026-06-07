@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Edit Dokter</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dokter.update', $dataeditdokter->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                    
                    <div class="form-group">
                        <label>Nama Dokter</label>
                        <input type="text" name="name" class="form-control" value="{{ $dataeditdokter->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Spesialis</label>
                        <select name="spesialis_id" class="form-control" required>
                            <option value="">-- Pilih Spesialis --</option>
                            @foreach ($spesialis as $s)
                                <option value="{{ $s->id }}" {{ $dataeditdokter->spesialis_id == $s->id ? 'selected' : '' }}>
                                    {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $dataeditdokter->no_hp }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Ubah
                    </button>
                    <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection