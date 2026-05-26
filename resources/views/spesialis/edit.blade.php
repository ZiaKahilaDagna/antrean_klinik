@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Edit Spesialis</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('spesialis.update', $dataeditspesialis->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                    
                    <div class="form-group">
                        <label>Nama Spesialis</label>
                        <input type="text" name="name" class="form-control" value="{{ $dataeditspesialis->name }}" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('spesialis.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection