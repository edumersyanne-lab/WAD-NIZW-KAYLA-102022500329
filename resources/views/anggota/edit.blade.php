
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota | Digital Library</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="content">
    <h1>Edit Anggota</h1>

    @if ($errors->any())
        <p>{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('anggota.update', $anggota->id) }}">
        @csrf
        @method('PUT')

        <p>
            <label>Nama Anggota</label><br>
            <input type="text" name="nama"
                value="{{ old('nama', $anggota->nama) }}" required>
        </p>

        <p>
            <label>Tipe Anggota</label><br>
            <select name="tipe" required>
                @foreach (['Mahasiswa', 'Dosen', 'Umum'] as $tipe)
                    <option value="{{ $tipe }}"
                        {{ old('tipe', $anggota->tipe) == $tipe ? 'selected' : '' }}>
                        {{ $tipe }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Status</label><br>
            <select name="status" required>
                @foreach (['Aktif', 'Tidak Aktif'] as $status)
                    <option value="{{ $status }}"
                        {{ old('status', $anggota->status) == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('anggota.index') }}">Kembali</a>
    </form>
</div>

</body>
</html>
