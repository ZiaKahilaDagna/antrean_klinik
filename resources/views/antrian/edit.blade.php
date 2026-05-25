@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Edit Antrian</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
            @if ($errors->any())
                    <strong>Terjadi kesalahan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('antrian.update', $dataeditantrian->id) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <label>Kode Antrian:</label>
                <input type="text" name="kode_antrian" value="{{ $dataeditantrian->kode_antrian }}" required>
                <br>
                <label>Nama Pasien:</label>
                <select name="pasien_id" required>
                    <option value="">-- Pilih Pasien --</option>
                    @foreach ($pasien as $p)
                        <option value="{{ $p->id }}" {{ $dataeditantrian->pasien_id == $p->id ? 'selected' : '' }}>
                            {{ $p->name }} - {{ $p->no_hp }}
                        </option>
                    @endforeach
                </select>
                <br>
                <label>Nama Dokter:</label>
                <select name="dokter_id" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($dokter as $d)
                        <option value="{{ $d->id }}" {{ $dataeditantrian->dokter_id == $d->id ? 'selected' : '' }}>
                            {{ $d->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <label>Jadwal (Hari & Jam):</label>
                <select name="jadwal_id" required>
                    <option value="">-- Pilih Jadwal --</option>
                    @foreach ($jadwal as $j)
                        <option value="{{ $j->id }}" {{ $dataeditantrian->jadwal_id == $j->id ? 'selected' : '' }}>
                            {{ $j->hari }} ({{ $j->jam_mulai }} - {{ $j->jam_selesai }})
                        </option>
                    @endforeach
                </select>
                <br>
                <label>Keluhan:</label>
                <textarea name="keluhan" rows="3">{{ $dataeditantrian->keluhan }}</textarea>
                <br>
                    <div class="form-group">
                        <label>Status:</label>
                        <input type="text" name="status" required placeholder="Contoh: Menunggu / Dipanggil / Selesai">
                    </div>
                <br>
                <label>Waktu Daftar:</label>
                <input type="text" name="waktu_daftar" value="{{ $dataeditantrian->waktu_daftar }}" required placeholder="YYYY-MM-DD HH:MM:SS">
                <small>Format: 2026-05-25 08:00:00</small>
                <br>
                    <div class="form-group">
                        <label>Waktu Panggil:</label>
                        <input type="text" name="waktu_panggil" placeholder="YYYY-MM-DD HH:MM:SS">
                        <small>Kosongkan jika belum dipanggil</small>
                    </div>
                <button type="submit">Update</button>
            </form>

            <br>
            <a href="{{ route('antrian.index') }}"></a>
            </div>
        </div>
    </div>
</div> 
@endsection