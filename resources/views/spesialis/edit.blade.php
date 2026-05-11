<h3>halaman</h3>
<form action="{{ route('spesialis.update', $dataeditspesialis->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <label>Nama:</label>
    <input type="text" name="name" value="{{$dataeditspesialis->name}}" required>
    <br>
    <button type="submit">Update</button>
</form>