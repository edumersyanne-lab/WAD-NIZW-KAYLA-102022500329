<?php
include "koneksi.php";

if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];

    $stmt = mysqli_prepare($conn, "DELETE FROM anggota WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}

header("Location: anggota.php");
exit;
?>