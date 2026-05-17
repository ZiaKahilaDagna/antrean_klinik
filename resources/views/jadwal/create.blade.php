<h3>halaman create jadwal</h3>
<form action="{{ route('jadwal.store') }}" method="POST">
    {{ csrf_field() }}
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
    <input type="time" name="jam_mulai" required>
    <br>
    <label>Jam Selesai:</label>
    <input type="time" name="jam_selesai" required>
    <br>
    <button type="submit">Save</button>
</form>