<@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Create Antrian</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
            <form action="{{ route('antrian.store') }}" method="POST">
                {{ csrf_field() }}
                    <label>Nama Pasien:</label>
                    <select name="pasien_id" required>
                        <option value="">-- Pilih Pasien --</option>
                        @foreach ($pasien as $p)
                            <option value="{{ $p->id }}">{{ $p->name }} - {{ $p->no_hp }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label>Nama Dokter:</label>
                    <select name="dokter_id" required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach ($dokter as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label>Jadwal (Hari & Jam):</label>
                    <select name="jadwal_id" required>
                        <option value="">-- Pilih Jadwal --</option>
                        @foreach ($jadwal as $j)
                            <option value="{{ $j->id }}">{{ $j->hari }} ({{ $j->jam_mulai }} - {{ $j->jam_selesai }})</option>
                        @endforeach
                    </select>
                    <br>
                    <label>Keluhan:</label>
                    <textarea name="keluhan" rows="3" cols="40" placeholder="Tulis keluhan..."></textarea>
                    <br>
                    <label>Waktu Daftar:</label>
                    <input type="text" name="waktu_daftar" required placeholder="YYYY-MM-DD HH:MM:SS">
                    <small>Contoh: 2026-05-25 08:00:00</small>
                    <br>
                    <button type="submit">Save</button>
            </form>
            </div>
        </div>
    </div>
</div> 
@endsection