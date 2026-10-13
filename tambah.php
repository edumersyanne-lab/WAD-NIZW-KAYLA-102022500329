
<?php
include "koneksi.php";

$error = "";

if (isset($_POST['simpan'])) {
    $nama = trim($_POST['nama']);
    $tipe = $_POST['tipe'];
    $status = $_POST['status'];

    if ($nama === "") {
        $error = "Nama anggota wajib diisi.";
    } else {
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO anggota (nama, tipe, status) VALUES (?, ?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "sss", $nama, $tipe, $status);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: anggota.php");
            exit;
        } else {
            $error = "Data gagal disimpan.";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota | Digital Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="content">
    <h1>Tambah Anggota</h1>

    <?php if ($error !== "") : ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <p>
            <label>Nama Anggota</label><br>
            <input type="text" name="nama" required>
        </p>

        <p>
            <label>Tipe Anggota</label><br>
            <select name="tipe" required>
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Dosen">Dosen</option>
                <option value="Umum">Umum</option>
            </select>
        </p>

        <p>
            <label>Status</label><br>
            <select name="status" required>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </p>

        <button type="submit" name="simpan">Simpan</button>
        <a href="anggota.php">Kembali</a>
    </form>
</div>

</body>
</html>
