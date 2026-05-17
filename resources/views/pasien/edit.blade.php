<h3>halaman edit pasien\</h3>
<form action="{{ route('pasien.update', $dataeditpasien->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <label>Nama Pasien:</label>
    <input type="text" name="name" value="{{$dataeditpasien->name}}" required>
    <br>
    <label>Alamat:</label>
    <input type="text" name="address" value="{{$dataeditpasien->address}}" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" value="{{$dataeditpasien->email}}" required>
    <br>
    <label>Nomor Telp:</label>
    <input type="text" name="no_hp" value="{{$dataeditpasien->no_hp}}" required>
    <br>
    <label>Jenis Kelamin:</label>
    <select name="jenis_kelamin" required>
    <option value="">Pilih Jenis Kelamin</option>
    <option value="L">Laki-laki</option>
    <option value="P">Perempuan</option>
    </select>
    <br>
    <button type="submit">Update</button>
</form>