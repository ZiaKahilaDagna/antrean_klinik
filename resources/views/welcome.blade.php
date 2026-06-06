<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian Klinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<!-- Hero Section -->
<div class="bg-primary text-white text-center py-5">
    <h1>Sistem Antrian Klinik</h1>
    <p class="lead">Kelola antrian pasien dengan mudah</p>
    <a href="{{ route('login') }}" class="btn btn-light mt-3">Login Sekarang</a>
</div>

<!-- 3 Fitur Sederhana -->
<div class="container my-5">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card p-3">
                <h3>📋</h3>
                <h5>Manajemen Antrian</h5>
                <p>Atur dan panggil antrian pasien</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h3>👨‍⚕️</h3>
                <h5>Manajemen Dokter</h5>
                <p>Kelola data dokter dan jadwal</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h3>👥</h3>
                <h5>Manajemen Pasien</h5>
                <p>Data pasien tersimpan rapi</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>