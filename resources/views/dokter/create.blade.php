<h3>halaman create dokter</h3>
<form action="{{ route('dokter.store') }}" method="POST">
    {{ csrf_field() }}
    <label>Nama:</label>
    <input type="text" name="name" required>
    <br>
    <label>Spesialis:</label>
    <select name="spesialis_id">
        <option value="">-- Pilih Spesialis --</option>
        @foreach ($spesialis as $spesialis)
        <option value="{{ $spesialis->spesialis_id }}">
            {{ $spesialis->name }}
        </option>
        @endforeach
    </select>
    <br>
    <label>Nomor telp</label>
    <input type="text" name="no_hp" required>
    <button type="submit">Save</button>
</form>