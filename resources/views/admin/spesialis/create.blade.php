@extends('admin.template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Create Spesialis</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.spesialis.store') }}" method="POST">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label>Nama Spesialis</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.spesialis.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection