<h3>halaman create pasien</h3>
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