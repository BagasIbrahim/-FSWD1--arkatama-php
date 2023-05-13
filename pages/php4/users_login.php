<?php
session_start();
// Jika bisa login maka ke index.php
if (isset($_SESSION['login'])) {
    header('location: users_read.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require_once 'db_koneksi.php';

// jika tombol yang bernama login diklik
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // password menggunakan md5

    // mengambil data dari user dimana username yg diambil
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $result = mysqli_num_rows($query);

    // jika $result lebih dari 0, maka berhasil login dan masuk ke index.php
    if ($result > 0) {
        $_SESSION['login'] = true;

        header('location: users_read.php');
        exit;
    }
    // jika $result adalah 0 maka tampilkan error
    else {
        $error = 'Email atau password salah';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <?php if (isset($error)) { ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php } ?>
                            <div class="form-group mb-3">
                                <label for="username" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                <input type="checkbox" class="form-checkbox"> Show password
                            </div>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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