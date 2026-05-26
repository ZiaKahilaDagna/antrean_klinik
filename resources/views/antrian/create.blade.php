@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Create Antrian</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('antrian.store') }}" method="POST">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label>Nama Pasien:</label>
                        <select name="pasien_id" class="form-control" required>
                            <option value="">-- Pilih Pasien --</option>
                            @foreach ($pasien as $p)
                                <option value="{{ $p->id }}">{{ $p->name }} - {{ $p->no_hp }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Dokter:</label>
                        <select name="dokter_id" class="form-control" required>
                            <option value="">-- Pilih Dokter --</option>
                            @foreach ($dokter as $d)
                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jadwal (Hari & Jam):</label>
                        <select name="jadwal_id" class="form-control" required>
                            <option value="">-- Pilih Jadwal --</option>
                            @foreach ($jadwal as $j)
                                <option value="{{ $j->id }}">{{ $j->hari }} ({{ $j->jam_mulai }} - {{ $j->jam_selesai }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keluhan:</label>
                        <textarea name="keluhan" class="form-control" rows="3" placeholder="Tulis keluhan..."></textarea>
                    </div>

                    {{-- WAKTU DAFTAR DIHAPUS! Otomatis di controller --}}
                    <input type="hidden" name="waktu_daftar" value="{{ now() }}">

                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle"></i> 
                        <strong>Perhatian:</strong> Waktu daftar akan diisi OTOMATIS oleh sistem.
                    </div>

                    <button type="submit" class="btn btn-primary">
                       <i class="fas fa-save"></i> Save
                    </button>
                    <a href="{{ route('antrian.index') }}" class="btn btn-secondary">
                       <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection