<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="5">
    <title>Monitor Antrian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: #1a2332;
            height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Segoe UI', sans-serif;
            overflow: hidden;
        }

        /* ── MAIN AREA ── */
        .main {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        /* ── KIRI: Dipanggil ── */
        .panel-kiri {
            flex: 0 0 62%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 48px;
            background: #1a2332;
        }

        .label-go {
            font-size: 22px;
            color: #94a3b8;
            font-weight: 500;
            letter-spacing: 1px;
            margin-bottom: 16px;
        }

        .box-nomor {
            background: #2d3f55;
            border-radius: 20px;
            padding: 48px 72px;
            text-align: center;
            width: 100%;
            max-width: 480px;
        }

        .nomor-utama {
            font-size: 120px;
            font-weight: 700;
            color: #ffffff;
            line-height: 1;
            letter-spacing: 6px;
        }

        .loket-utama {
            font-size: 26px;
            color: #94a3b8;
            margin-top: 16px;
            font-weight: 500;
        }

        .nama-pasien {
            font-size: 20px;
            color: #64748b;
            margin-top: 8px;
        }

        /* ── KANAN: Antrian berikutnya ── */
        .panel-kanan {
            flex: 0 0 38%;
            background: #243044;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .panel-kanan-header {
            padding: 20px 24px 16px;
            font-size: 15px;
            font-weight: 600;
            color: #64748b;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            border-bottom: 1px solid #2d3f55;
        }

        .list-antrian {
            flex: 1;
            overflow: hidden;
        }

        .item-antrian {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #2d3f55;
        }

        .item-antrian:last-child {
            border-bottom: none;
        }

        .item-nomor {
            font-size: 42px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 2px;
        }

        .item-loket {
            font-size: 14px;
            color: #64748b;
            margin-top: 2px;
        }

        .item-status {
            font-size: 13px;
            padding: 4px 14px;
            border-radius: 999px;
            font-weight: 500;
        }

        .status-menunggu {
            background: #2d3f55;
            color: #94a3b8;
        }

        .status-dipanggil {
            background: #1e4532;
            color: #4ade80;
        }

        .status-selesai {
            background: #1e293b;
            color: #475569;
        }

        /* ── FOOTER ── */
        .footer {
            background: #141e2e;
            padding: 14px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #2d3f55;
        }

        .footer-logo {
            font-size: 15px;
            font-weight: 600;
            color: #475569;
            letter-spacing: 1px;
        }

        .footer-info {
            font-size: 14px;
            color: #475569;
        }

        .footer-jam {
            font-size: 22px;
            font-weight: 600;
            color: #94a3b8;
        }
    </style>
</head>
<body>

<div class="main">

    {{-- PANEL KIRI --}}
    <div class="panel-kiri">
        @if($dipanggil)
            <div class="label-go">Silakan menuju ke</div>
            <div class="box-nomor">
                <div class="nomor-utama">{{ $dipanggil->kode_antrian }}</div>
                <div class="loket-utama">{{ $dipanggil->dokter->name ?? 'Loket' }}</div>
                @if($dipanggil->pasien->name ?? false)
                    <div class="nama-pasien">{{ $dipanggil->pasien->name }}</div>
                @endif
            </div>
        @else
            <div class="label-go">Menunggu panggilan</div>
            <div class="box-nomor">
                <div class="nomor-utama" style="color: #2d3f55;">---</div>
                <div class="loket-utama">Harap menunggu</div>
            </div>
        @endif
    </div>

    {{-- PANEL KANAN --}}
    <div class="panel-kanan">
        <div class="panel-kanan-header">Now Serving</div>
        <div class="list-antrian">
            @forelse($antrian->take(6) as $item)
            <div class="item-antrian">
                <div>
                    <div class="item-nomor">{{ $item->kode_antrian }}</div>
                    <div class="item-loket">{{ $item->dokter->name ?? '-' }}</div>
                </div>
                <div>
                    @if($item->status == 'menunggu')
                        <span class="item-status status-menunggu">Menunggu</span>
                    @elseif($item->status == 'dipanggil;')
                        <span class="item-status status-dipanggil">Dipanggil</span>
                    @else
                        <span class="item-status status-selesai">Selesai</span>
                    @endif
                </div>
            </div>
            @empty
            <div class="item-antrian">
                <div class="item-loket" style="color: #475569;">Belum ada antrian</div>
            </div>
            @endforelse
        </div>
    </div>

</div>

{{-- FOOTER --}}
<div class="footer">
    <div class="footer-logo">KLINIK SEHAT</div>
    <div class="footer-info">Ambil nomor antrian di loket pendaftaran</div>
    <div class="footer-jam">{{ date('H:i') }}</div>
</div>

<script>
    let lastNomor = document.querySelector('.nomor-utama')?.innerText;
    setInterval(function () {
        fetch(window.location.href)
            .then(r => r.text())
            .then(html => {
                const tmp = document.createElement('div');
                tmp.innerHTML = html;
                const newNomor = tmp.querySelector('.nomor-utama')?.innerText;
                if (newNomor && newNomor !== lastNomor && newNomor !== '---') {
                    new Audio('https://www.soundjay.com/misc/sounds/bell-ringing-05.mp3').play().catch(() => {});
                    lastNomor = newNomor;
                }
            }).catch(() => {});
    }, 5000);
</script>
</body>
</html>