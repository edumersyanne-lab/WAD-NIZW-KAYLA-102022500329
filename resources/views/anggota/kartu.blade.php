<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Anggota | Digital Library</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="content">
    <h1>Kartu Anggota</h1>

    <div class="kartu-anggota">
        <h2>Digital Library</h2>
        <hr>

        <p><strong>ID Anggota:</strong> {{ $anggota->id }}</p>
        <p><strong>Nama:</strong> {{ $anggota->nama }}</p>
        <p><strong>Tipe Anggota:</strong> {{ $anggota->tipe }}</p>
        <p><strong>Status:</strong> {{ $anggota->status }}</p>

        <p>Terdaftar sebagai anggota Digital Library.</p>
    </div>

    <p>
        <a href="{{ route('anggota.index') }}">Kembali ke Data Anggota</a>
    </p>

    <button onclick="window.print()">Cetak Kartu</button>
</div>

</body>
</html>
