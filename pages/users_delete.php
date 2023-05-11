<?php
require_once 'db_koneksi.php';

if (isset($_GET['id'])) {
    $users_id = $_GET['id'];

    // Query untuk menghapus data
    $query = "DELETE FROM users WHERE id = '$users_id'";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        header('Location: users_read.php');
        echo 'Data berhasil dihapus';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
} else {
    echo 'Data tidak ditemukan';
}



?>

