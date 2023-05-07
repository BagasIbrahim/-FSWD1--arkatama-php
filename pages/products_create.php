<?php
require_once 'db_koneksi.php';

// Ambil data dari form
$id_category = $_POST['id_category'];
$name = $_POST['name_product'];
$desc = $_POST['deskripsi'];
$price = $_POST['price'];
$status = $_POST['status'];
$create_by = $_POST['create_by'];
$verify_by = $_POST['verify_by'];


// Query untuk menambah data
$query = "INSERT INTO products (category_id, name, description, price, status, created_by, verified_by) 
VALUES ('$id_category', '$name', '$desc', '$price', '$status', '$create_by', '$verify_by')";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    echo 'Data berhasil ditambahkan';
} else {
    echo 'Error: ' . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);

// include 'db_koneksi.php'; // menghubungkan ke database
// // memanggil fungsi insertCategory dengan nilai yang akan di-insert
// echo buatProducts($conn, 'Produk 33', '13', 'Lorem, ipsum dolor sit', '25000.00', 'waiting', '1', '2');

?>