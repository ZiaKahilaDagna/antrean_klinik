<h3>halaman index pasien</h3>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Nomor Telp</th>
            <th>Jenis Kelamin</th>
            <th>
                <a href="{{ route('pasien.create') }}">+ Create Pasien</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pasien as $v)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->address }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->no_hp }}</td>
            <td>
                {{ $v->jenis_kelamin == 'L' ? 'Laki-laki' : ($v->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}
            </td>
            <td>
                <form action="{{ route('pasien.destroy', $v->id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('pasien.edit', $v->id) }}">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this pasien?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>