<?php
include "koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM anggota ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota | Digital Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="content">
    <div class="page-header">
        <h1>Data Anggota</h1>
        <p>Daftar anggota Digital Library</p>
    </div>

    <p>
        <a href="tambah.php">+ Tambah Anggota</a>
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
            <?php while ($anggota = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= htmlspecialchars($anggota['id']) ?></td>
                <td><?= htmlspecialchars($anggota['nama']) ?></td>
                <td><?= htmlspecialchars($anggota['tipe']) ?></td>
                <td><?= htmlspecialchars($anggota['status']) ?></td>
                <td>
                    <a href="kartu.php?id=<?= htmlspecialchars($anggota['id']) ?>">Lihat Kartu</a> |

                <form action="hapus.php" method="POST">
                    <input type="hidden" name="id" value="<?= $anggota['id'] ?>">
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>