<h3>halaman create antrian</h3>
<form action="{{ route('antrian.store') }}" method="POST">
    {{ csrf_field() }}
    <label>Nama Pasien:</label>
    <select name="pasien_id" required>
        <option value="">-- Pilih Pasien --</option>
        @foreach ($pasien as $p)
            <option value="{{ $p->id }}">{{ $p->name }} - {{ $p->no_hp }}</option>
        @endforeach
    </select>
    <br>
    <label>Nama Dokter:</label>
    <select name="dokter_id" required>
        <option value="">-- Pilih Dokter --</option>
        @foreach ($dokter as $d)
            <option value="{{ $d->id }}">{{ $d->name }}</option>
        @endforeach
    </select>
    <br>
    <br>
    <label>Jadwal (Hari & Jam):</label>
    <select name="jadwal_id" required>
        <option value="">-- Pilih Jadwal --</option>
        @foreach ($jadwal as $j)
            <option value="{{ $j->id }}">
                {{ $j->hari }} ({{ $j->jam_mulai }} - {{ $j->jam_selesai }})
            </option>
        @endforeach
    </select>
    <br>
    <label>Keluhan:</label>
    <textarea name="keluhan"></textarea>
    <br>
    <label>Status:</label>
    <input type="text" name="status" required>
    <br>
    <label>Waktu Daftar:</label>
    <input type="text" name="waktu_daftar" required>
    <br>
    <label>Waktu Panggil:</label>
    <input type="text" name="waktu_panggil required">
    <br>
    <button type="submit">Save</button>
</form>