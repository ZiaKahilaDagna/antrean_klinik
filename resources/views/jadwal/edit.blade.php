<h3>halaman edit jadwal</h3>
<form action="{{ route('jadwal.update', $dataeditjadwal->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <label>Nama Dokter:</label>
    <select name="dokter_id">
        <option value="">-- Pilih Dokter --</option>
        @foreach ($dokter as $dokter)
        <option value="{{ $dokter->id }}">
            {{ $dokter->name }}
        </option>
        @endforeach
    </select>
    <br>
    <label>Hari:</label>
    <select name="hari">
    <option value="">-- Pilih Hari --</option>
    @foreach ($hari as $item)  {{-- ganti nama variabel loop --}}
    <option value="{{ $item }}">  {{-- $item isinya string "Senin", dll --}}
        {{ $item }}
    </option>
    @endforeach
    </select>
    <br>
    <label>Jam Mulai:</label>
    <input type="text" name="jam_mulai" value="{{$dataeditjadwal->name}}" required>
    <br>
    <label>Jam Selesai:</label>
    <input type="text" name="jam_selesai" value="{{$dataeditjadwal->name}}" required>
    <br>
    <button type="submit">Update</button>
</form>