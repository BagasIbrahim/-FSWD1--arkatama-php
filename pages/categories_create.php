<?php
// Koneksi ke database
require_once 'db_koneksi.php';

function buatCategories($conn, $name){
    
// // Query untuk menambah data
// $query = "INSERT INTO categories (name) 
//     VALUES ('$name')";
// // Eksekusi query
// if (mysqli_query($conn, $query)) {
//     echo 'Data berhasil ditambahkan';
// } else {
//     echo "Error: " . $query . "<br>" . mysqli_error($conn);
// }
}

if (isset($_POST['submit'])) {
    $buatCategories=$_POST['name'];
    $query = mysqli_query($conn, "INSERT INTO categories (name) VALUES ('$buatCategories')");
    echo "Data berhasil ditambahkan";
}

// // Tutup koneksi    
// // mysqli_close($conn);
// }
// include 'db_koneksi.php'; // menghubungkan ke database
// // memanggil fungsi insertCategory dengan nilai yang akan di-insert
// echo buatCategories($conn, 'Kategori 13');


?>