<h3>halaman edit antrian\</h3>
<form action="{{ route('antrian.update', $dataeditantrian->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <label>No:</label>
    <input type="text" name="name" value="{{$dataeditantrian->name}}" required>
    <br>
    <label>Kode Antrian:</label>
    <input type="text" name="kode_antrian" value="{{$dataeditantrian->name}}" required>
    <br>
    <label>Nama Pasien:</label>
    <input type="text" name="pasien_id" value="{{$dataeditantrian->name}}" required>
    <br>
    <label>Nama Dokter:</label>
    <select name="dokter_id">
        <option value="">-- Pilih Dokter --</option>
        @foreach ($dokter as $dokter)
        <option value="{{ $dokter->dokter_id }}">
            {{ $dokter->name }}
        </option>
        @endforeach
    </select>
    <br>
    <label>Jadwal:</label>
    <input type="text" name="jadwal_id" value="{{$dataeditantrian->name}}" required>
    <br>
    <label>Keluhan:</label>
    <input type="text" name="keluhan" value="{{$dataeditantrian->name}}" required>
    <br>
    <label>Status:</label>
    <input type="text" name="status" value="{{$dataeditantrian->name}}" required>
    <br>
    <label>Waktu Daftar:</label>
    <input type="text" name="waktu_daftar" value="{{$dataeditantrian->name}}" required>
    <br>
    <label>Waktu Panggil:</label>
    <input type="text" name="waktu_panggil" value="{{$dataeditantrian->name}}" required>
    <br>
    <button type="submit">Update</button>
</form>