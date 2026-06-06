@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Edit Jadwal</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jadwal.update', $dataeditjadwal->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                    
                    <div class="form-group">
                        <label>Nama Dokter</label>
                        <select name="dokter_id" class="form-control" required>
                            <option value="">-- Pilih Dokter --</option>
                            @foreach ($dokter as $dokterItem)
                                <option value="{{ $dokterItem->id }}" {{ $dataeditjadwal->dokter_id == $dokterItem->id ? 'selected' : '' }}>
                                    {{ $dokterItem->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" class="form-control" required>
                            <option value="">-- Pilih Hari --</option>
                            @foreach ($hari as $item)
                                <option value="{{ $item }}" {{ $dataeditjadwal->hari == $item ? 'selected' : '' }}>
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control" value="{{ $dataeditjadwal->jam_mulai }}" required>
                    </div>

                    <div class="form-group">
                        <label>Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-control" value="{{ $dataeditjadwal->jam_selesai }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection