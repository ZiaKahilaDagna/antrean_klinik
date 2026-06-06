@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Edit Antrian</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi kesalahan:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.antrian.update', $dataeditantrian->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')

                    {{-- KODE ANTRIAN (Readonly/Disabled) --}}
                    <div class="form-group">
                        <label>Kode Antrian:</label>
                        <input type="text" class="form-control" value="{{ $dataeditantrian->kode_antrian }}" disabled readonly>
                        <small class="text-muted">Kode antrian tidak dapat diubah</small>
                    </div>

                    {{-- NAMA PASIEN --}}
                    <div class="form-group">
                        <label>Nama Pasien:</label>
                        <select name="pasien_id" class="form-control" required>
                            <option value="">-- Pilih Pasien --</option>
                            @foreach ($pasien as $p)
                                <option value="{{ $p->id }}" {{ $dataeditantrian->pasien_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->name }} - {{ $p->no_hp }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- NAMA DOKTER --}}
                    <div class="form-group">
                        <label>Nama Dokter:</label>
                        <select name="dokter_id" class="form-control" required>
                            <option value="">-- Pilih Dokter --</option>
                            @foreach ($dokter as $d)
                                <option value="{{ $d->id }}" {{ $dataeditantrian->dokter_id == $d->id ? 'selected' : '' }}>
                                    {{ $d->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- JADWAL --}}
                    <div class="form-group">
                        <label>Jadwal (Hari & Jam):</label>
                        <select name="jadwal_id" class="form-control" required>
                            <option value="">-- Pilih Jadwal --</option>
                            @foreach ($jadwal as $j)
                                <option value="{{ $j->id }}" {{ $dataeditantrian->jadwal_id == $j->id ? 'selected' : '' }}>
                                    {{ $j->hari }} ({{ $j->jam_mulai }} - {{ $j->jam_selesai }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- KELUHAN --}}
                    <div class="form-group">
                        <label>Keluhan:</label>
                        <textarea name="keluhan" class="form-control" rows="3">{{ $dataeditantrian->keluhan }}</textarea>
                    </div>

                    {{-- STATUS (pilih dari dropdown, bukan input text) --}}
                    <div class="form-group">
                        <label>Status:</label>
                        <select name="status" class="form-control" required>
                            <option value="menunggu" {{ $dataeditantrian->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="dipanggil" {{ $dataeditantrian->status == 'dipanggil' ? 'selected' : '' }}>Dipanggil</option>
                            <option value="selesai" {{ $dataeditantrian->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="batal" {{ $dataeditantrian->status == 'batal' ? 'selected' : '' }}>Batal</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.antrian.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection