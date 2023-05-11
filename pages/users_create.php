<?php
require_once 'db_koneksi.php';

// Ambil data dari form
$name = $_POST['name'];
$role = $_POST['role'];
$password = $_POST['password'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];


// Query untuk menambah data
$query = "INSERT INTO users (name, role, password, email, phone, address) 
VALUES ('$name', '$role', '$password', '$email', '$telp', '$alamat')";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    header('Location: users_read.php');
    echo 'Data berhasil ditambahkan';
} else {
    echo 'Error: ' . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);