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
// if(!isset($_SESSION['password'])){
//     header("location: login_form.php");
// }

if (isset($_POST['detail'])) {
    $users_id = $_POST['id'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    // Update the record
    $query = "UPDATE users SET name = '$name', role = '$role', 
    password = '$password', email = '$email', phone = '$telp', 
    address = '$alamat' WHERE id = '$users_id'";
    $result = mysqli_query($conn, $query);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Detail Pengguna</title>
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Detail Pengguna</h1>
            <div>
                <a href="users_read.php" class="btn btn-primary">Kembali</a>
            </div>
        </header>

        <?php
        if (isset($_GET['id'])) {
            $users_id = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT * FROM users WHERE id='$users_id'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $users = mysqli_fetch_assoc($result);
        ?>
                <form class="row g-3" method="post">
                    <input type="hidden" name="id" value="<?= $users['id'] ?>">

                    <div class="col-12">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="<?= $users['name'] ?>" id="name" name="name" placeholder="Nama Lengkap">
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option value="admin" <?php if ($users['role'] == 'admin') {
                                                        echo 'selected';
                                                    } ?>>Admin</option>
                            <option value="staff" <?php if ($users['role'] == 'staff') {
                                                        echo 'selected';
                                                    } ?>>Staff</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?= $users['password'] ?>">
                        <input type="checkbox" class="form-checkbox"> Show password
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $users['email'] ?>" placeholder="name@examples.com">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Telp</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $users['phone'] ?>" placeholder="08xxxx">
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $users['address'] ?>">
                    </div>
                </form>
        <?php

            } else {
                echo "<h4>Id tidak ditemukan</h4>";
            }
        }
        ?>
    </div>
</body>
<script src="../../assets/bootstrap/javascript/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });
    });
</script>

</html>