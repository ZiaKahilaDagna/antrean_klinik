@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Edit Spesialis</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
            <form action="{{ route('spesialis.update', $dataeditspesialis->id) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <label>Nama</label>
                <input type="text" name="name" value="{{$dataeditspesialis->name}}" required>
                <br>
                <button type="submit">Update</button>
            </form>
            </div>
        </div>
    </div>
</div> 
@endsection     