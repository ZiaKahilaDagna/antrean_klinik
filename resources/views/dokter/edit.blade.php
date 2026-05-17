<h3>halaman edit dokter</h3>
<form action="{{ route('dokter.update', $dataeditdokter->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <label>Nama:</label>
    <input type="text" name="name" value="{{$dataeditdokter->name}}" required>
    <br>
    <label>Spesialis:</label>
    <input type="text" name="spesialis_id" value="{{$dataeditdokter->name}}" required>
    <br>
    <label>Nomor telp:</label>
    <input type="text" name="no_hp" value="{{$dataeditdokter->name}}" required>
    <br>
    <button type="submit">Update</button>
</form>