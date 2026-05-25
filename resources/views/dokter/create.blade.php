@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Create Dokter</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
            <form action="{{ route('dokter.store') }}" method="POST">
                {{ csrf_field() }}
                <label>Nama</label>
                <input type="text" name="name" required>
                <br>
                <label>Spesialis</label>
                <select name="spesialis_id">
                    <option value="">-- Pilih Spesialis --</option>
                    @foreach ($spesialis as $spesialis)
                    <option value="{{ $spesialis->id }}">
                        {{ $spesialis->name }}
                    </option>
                    @endforeach
                </select>
                <br>
                <label>Nomor telp</label>
                <input type="text" name="no_hp" required>
                <button type="submit">Save</button>
            </form>
            </div>
        </div>
    </div>
</div> 
@endsection