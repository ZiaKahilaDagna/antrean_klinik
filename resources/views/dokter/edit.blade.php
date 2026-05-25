@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Edit Dokter</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
            <form action="{{ route('dokter.update', $dataeditdokter->id) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <label>Nama</label>
                <input type="text" name="name" value="{{ $dataeditdokter->name }}" required>
                <br>
                <label>Spesialis</label>
                <select name="spesialis_id">
                    <option value="">-- Pilih Spesialis --</option>
                    @foreach ($spesialis as $s)
                    <option value="{{ $s->id }}" {{ $dataeditdokter->spesialis_id == $s->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>
                    @endforeach
                </select>
                <br>
                <label>Nomor telp</label>
                <input type="text" name="no_hp" value="{{ $dataeditdokter->no_hp }}" required>
                <br>
                <button type="submit">Update</button>
            </form>
            </div>
        </div>
    </div>
</div> 
@endsection