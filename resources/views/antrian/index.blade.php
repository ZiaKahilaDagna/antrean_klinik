<h3>halaman index antrian</h3>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Antrian</th>
            <th>Nama Pasien</th>
            <th>Nama Dokter</th>
            <th>Jadwal</th>
            <th>Keluhan</th>
            <th>Status</th>
            <th>Waktu Daftar</th>
            <th>Waktu Panggil</th>
            <th>
                <a href="{{ route('antrian.create') }}">+ Create Antrian</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($antrian as $v)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $v->kode_antrian }}</td>
            <td>{{ $v->pasien_id }}</td>
            <td>{{ $v->dokter_id }}</td>
            <td>{{ $v->jadwal_id }}</td>
            <td>{{ $v->keluhan }}</td>
            <td>{{ $v->status }}</td>
            <td>{{ $v->waktu_daftar }}</td>
            <td>{{ $v->waktu_panggil }}</td>
            <td>
                <form action="{{ route('antrian.destroy', $v->id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('antrian.edit', $v->id) }}">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this antrian?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>                                                                         