<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:users_login.php');
    exit;
}
require_once 'db_koneksi.php';

// // Cek jika belum login
// if(!isset($_SESSION['email'])){
//     header("location: login_form.php");
// }
// if (!isset($_SESSION['password'])) {
//     header("location: login_form.php");
// }

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

