
<?php
include "koneksi.php";

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header("Location: anggota.php");
    exit;
}

$id = (int) $_GET['id'];
$error = "";

$stmt = mysqli_prepare($conn, "SELECT * FROM anggota WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$anggota = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$anggota) {
    die("Data anggota tidak ditemukan.");
}

if (isset($_POST['simpan'])) {
    $nama = trim($_POST['nama']);
    $tipe = $_POST['tipe'];
    $status = $_POST['status'];

    if ($nama === "") {
        $error = "Nama anggota wajib diisi.";
    } elseif (
        !in_array($tipe, ['Mahasiswa', 'Dosen', 'Umum'], true) ||
        !in_array($status, ['Aktif', 'Tidak Aktif'], true)
    ) {
        $error = "Pilihan tipe atau status tidak valid.";
    } else {
        $stmt = mysqli_prepare(
            $conn,
            "UPDATE anggota SET nama = ?, tipe = ?, status = ? WHERE id = ?"
        );

        mysqli_stmt_bind_param($stmt, "sssi", $nama, $tipe, $status, $id);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: anggota.php");
            exit;
        } else {
            $error = "Data gagal diperbarui.";
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
    <title>Edit Anggota | Digital Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="content">
    <h1>Edit Anggota</h1>

    <?php if ($error !== "") : ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <p>
            <label>Nama Anggota</label><br>
            <input
                type="text"
                name="nama"
                value="<?= htmlspecialchars($anggota['nama']) ?>"
                required
            >
        </p>

        <p>
            <label>Tipe Anggota</label><br>
            <select name="tipe" required>
                <?php foreach (['Mahasiswa', 'Dosen', 'Umum'] as $pilihan) : ?>
                    <option
                        value="<?= $pilihan ?>"
                        <?= $anggota['tipe'] === $pilihan ? 'selected' : '' ?>
                    >
                        <?= $pilihan ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label>Status</label><br>
            <select name="status" required>
                <?php foreach (['Aktif', 'Tidak Aktif'] as $pilihan) : ?>
                    <option
                        value="<?= $pilihan ?>"
                        <?= $anggota['status'] === $pilihan ? 'selected' : '' ?>
                    >
                        <?= $pilihan ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <button type="submit" name="simpan">Simpan Perubahan</button>
        <a href="anggota.php">Kembali</a>
    </form>
</div>

</body>
</html>
