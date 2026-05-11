<h3>halaman index</h3>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>
                <a href="{{ route('spesialis.create') }}">+ Create Spesialis</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($spesialis as $v)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $v->name }}</td>
            <td>
                <form action="{{ route('spesialis.destroy', $v->id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('spesialis.edit', $v->id) }}">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this spesialis?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>                                                                         