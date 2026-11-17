<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota | Digital Library</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="content">
    <h1>Data Anggota</h1>
    <p>Daftar anggota Digital Library</p>

    <div>
        Login sebagai <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->role }})
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <p>
        <a href="{{ route('anggota.create') }}">+ Tambah Anggota</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($anggota as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tipe }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('anggota.edit', $item->id) }}">Edit</a>
                        |
                        <a href="{{ route('anggota.kartu', $item->id) }}">Lihat Kartu</a>

                        @if (auth()->user()->role === 'admin')
                            |
                            <form
                                action="{{ route('anggota.destroy', $item->id) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Yakin ingin menghapus anggota ini?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>