<?php
require_once 'db_koneksi.php';

// if (isset($_POST['submit'])) {
//     $targetDir = "../assets/images/";
//     $targetFile = $targetDir . basename($_FILES["avatar"]["name"]);

//     // Ambil data dari form
//     if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFile)) {
//         echo "The file " . basename($_FILES["avatar"]["name"]) . " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
    $name = $_POST['name'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    // Query untuk menambah data
    $query = "INSERT INTO users (name, role, password, email, phone, address) 
VALUES ('$name', '$role', '$password', '$email', '$telp', '$alamat',)";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        header('Location: users_read.php');
        echo 'Data berhasil ditambahkan';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
