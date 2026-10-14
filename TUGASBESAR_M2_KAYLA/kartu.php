<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: anggota.php");
    exit;
}

$id = (int) $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM anggota WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$anggota = mysqli_fetch_assoc($result);

if (!$anggota) {
    die("Data anggota tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kartu Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Kartu Anggota</h1>

<a href="anggota.php">Kembali ke Anggota</a>

<table>
    <tr>
        <th colspan="2">DIGITAL LIBRARY</th>
    </tr>
    <tr>
        <td>ID Anggota</td>
        <td><?= htmlspecialchars($anggota['id']) ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><?= htmlspecialchars($anggota['nama']) ?></td>
    </tr>
    <tr>
        <td>Tipe</td>
        <td><?= htmlspecialchars($anggota['tipe']) ?></td>
    </tr>
    <tr>
        <td>Status</td>
        <td><?= htmlspecialchars($anggota['status']) ?></td>
    </tr>
</table>

</body>
</html>