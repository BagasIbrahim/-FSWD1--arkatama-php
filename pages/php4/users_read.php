<html>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <title>Daftar Pengguna</title>
</head>

<body>
    <?php
    session_start();
    // Jika tidak bisa login maka balik ke login.php
    // jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
    if (!isset($_SESSION['login'])) {
        header('location:users_login.php');
        exit;
    }
    
    // Koneksi ke database
    require_once 'db_koneksi.php';

    // Query untuk menampilkan data
    $query = "SELECT * FROM users";

    // Eksekusi query
    $result = mysqli_query($conn, $query);
    ?>
    <!-- Tampilkan data -->
    <h1 class="mx-2">Daftar Pengguna</h1>
    <div>
        <a href="input_form.php" class="mx-2 btn btn-primary">Tambah Pengguna</a>
        <a href="users_logout.php" class="mx-2 btn btn-danger">Log Out</a>
    </div><br>

    <table id="myTable">

        <thead>
            <th>No</th>
            <th>Avatar</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['avatar'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['role'] ?></td>
                    <td class="actions">
                        <a href="users_detail.php?id=<?= $row['id'] ?>" class="mx-1 btn btn-primary"><i class="fas fa-info fa-xs"></i></a>
                        <a href="users_update.php?id=<?= $row['id'] ?>" class="mx-1 btn btn-success"><i class="fas fa-pen fa-xs"></i></a>
                        <a href="users_delete.php?id=<?= $row['id'] ?>" class="mx-1 btn btn-danger"><i class="fas fa-trash fa-xs"></i></a>
                    </td>
                </tr>

            <?php endwhile; ?>

        </tbody>

    </table>





    <!-- Tutup koneksi -->
    <?php
    mysqli_close($conn);
    ?>


</body>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>