@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Halaman Create Spesialis</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
            <form action="{{ route('spesialis.store') }}" method="POST">
                {{ csrf_field() }}
                <label>Nama</label>
                <input type="text" name="name" required>
                <br>
                <button type="submit">Save</button>
            </form>
            </div>
        </div>
    </div>
</div> 
@endsection 