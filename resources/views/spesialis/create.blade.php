<h3>halaman create</h3>
<form action="{{ route('spesialis.store') }}" method="POST">
    {{ csrf_field() }}
    <label>Nama:</label>
    <input type="text" name="name" required>
    <br>
    <button type="submit">Save</button>
</form>