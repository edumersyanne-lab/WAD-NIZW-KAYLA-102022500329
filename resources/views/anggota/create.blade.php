<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota | Digital Library</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="content">
    <h1>Tambah Anggota</h1>

    @if ($errors->any())
        <p>{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('anggota.store') }}">
        @csrf

        <p>
            <label>Nama Anggota</label><br>
            <input type="text" name="nama" value="{{ old('nama') }}" required>
        </p>

        <p>
            <label>Tipe Anggota</label><br>
            <select name="tipe" required>
                <option value="Mahasiswa" {{ old('tipe') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                <option value="Dosen" {{ old('tipe') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                <option value="Umum" {{ old('tipe') == 'Umum' ? 'selected' : '' }}>Umum</option>
            </select>
        </p>

        <p>
            <label>Status</label><br>
            <select name="status" required>
                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </p>

        <button type="submit">Simpan</button>
        <a href="{{ route('anggota.index') }}">Kembali</a>
    </form>
</div>

</body>
</html>
