@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Create Pasien</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
            <form action="{{ route('pasien.store') }}" method="POST">
                {{ csrf_field() }}
                <label>Nama Pasien</label>
                <input type="text" name="name" required>
                <br>
                <label>Alamat</label>
                <textarea name="address" >{{ old('address') }}</textarea>
                <br>
                <label>Email</label>
                <input type="email" name="email" >
                <br>
                <label>Nomor Telp</label>
                <input type="text" name="no_hp" required>
                <br>
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" required>
                <option value="">--Pilih Jenis Kelamin--</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
                </select>
                <br>
                <button type="submit">Save</button>
            </form>
            </div>
        </div>
    </div>
</div> 
@endsection    