@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Create Dokter</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dokter.store') }}" method="POST">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label>Nama Dokter</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: dr. Andi Wijaya" required>
                    </div>

                    <div class="form-group">
                        <label>Spesialis</label>
                        <select name="spesialis_id" class="form-control" required>
                            <option value="">-- Pilih Spesialis --</option>
                            @foreach ($spesialis as $spesialis)
                                <option value="{{ $spesialis->id }}">
                                    {{ $spesialis->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="Contoh: 08123456789" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
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