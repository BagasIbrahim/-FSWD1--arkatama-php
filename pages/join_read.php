<html>
    <head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  
  
    </head>
    <body>


<?php
// Koneksi ke database
require_once 'db_koneksi.php';


// Query untuk menampilkan data
$query = "SELECT products.id, categories.name AS categories_name, products.name AS products_name, 
products.description, products.price, products.status, products.created_at, 
products.updated_at, products.created_by, products.verified_at, products.verified_by
FROM products
INNER JOIN 
  (SELECT id, categories.name 
   FROM categories) AS categories	
ON products.category_id = categories.id;";

// Eksekusi query
$result = mysqli_query($conn, $query);
?>
 <!-- Tampilkan data -->
<table id="myTable">
<thead>
    <th>No</th>
    <th>Category</th>
    <th>Products</th>
    <th>Description</th>
    <th>Price</th>
    <th>Status</th>
    <th>Created</th>
    <th>Update</th>
    <th>Created By</th>
    <th>Verified</th>
    <th>Verified By</th>
</thead>
<tbody>
    <?php  
while ($row = mysqli_fetch_assoc($result)) :
    ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['categories_name'] ?></td>
        <td><?= $row['products_name'] ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['created_at'] ?></td>
        <td><?= $row['updated_at'] ?></td>
        <td><?= $row['created_by'] ?></td>
        <td><?= $row['verified_at'] ?></td>
        <td><?= $row['verified_by'] ?></td>
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
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</html>