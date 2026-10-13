
<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: anggota.php");
    exit;
}

if (!isset($_POST['id']) || !ctype_digit($_POST['id'])) {
    header("Location: anggota.php");
    exit;
}

$id = (int) $_POST['id'];

$stmt = mysqli_prepare($conn, "DELETE FROM anggota WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: anggota.php");
exit;
?>
