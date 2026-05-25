@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Edit Jadwal</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
            <form action="{{ route('jadwal.update', $dataeditjadwal->id) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                
                <label>Nama Dokter:</label>
                <select name="dokter_id" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($dokter as $dokterItem)
                    <option value="{{ $dokterItem->id }}" {{ $dataeditjadwal->dokter_id == $dokterItem->id ? 'selected' : '' }}>
                        {{ $dokterItem->name }}
                    </option>
                    @endforeach
                </select>
                <br>
                
                <label>Hari:</label>
                <select name="hari" required>
                    <option value="">-- Pilih Hari --</option>
                    @foreach ($hari as $item)
                    <option value="{{ $item }}" {{ $dataeditjadwal->hari == $item ? 'selected' : '' }}>
                        {{ $item }}
                    </option>
                    @endforeach
                </select>
                <br>
                
                <label>Jam Mulai:</label>
                <input type="time" name="jam_mulai" value="{{ $dataeditjadwal->jam_mulai }}" required>
                <br>
                
                <label>Jam Selesai:</label>
                <input type="time" name="jam_selesai" value="{{ $dataeditjadwal->jam_selesai }}" required>
                <br>
                
                <button type="submit">Update</button>
            </form>
            </div>
        </div>
    </div>
</div> 
@endsection