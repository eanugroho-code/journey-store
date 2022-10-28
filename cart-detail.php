<?php require 'koneksi.php' ?>
<?php

$id_produk = $_GET['id'];
$select_product = $mysqli->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$fetch_product = $select_product->fetch_assoc();

// echo "<pre>";
// print_r($fetch_product);
// echo "</pre>";
// $id = $_SESSION['id_pelanggan'];

// $query = mysqli_query($mysqli, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
// $data = mysqli_fetch_array($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="detail.css?v=<?php echo time(); ?>">

</head>
<style>

</style>

<body>
    <div class="main">
        <section>
            <div class="container">
                <div class="box">
                    <div class="images">
                        <div class="img-holder active">
                            <img src="journeyadmin/uploads/<?php echo $fetch_product['foto_produk']; ?>">
                        </div>
                    </div>
                    <div class="basic-info">
                        <h1><?php echo $fetch_product['nama_produk']; ?></h1>
                        <span>Rp. <?php echo number_format($fetch_product['harga_produk']); ?></span>
                        <h5> Stok: <?php echo $fetch_product['ketersediaan_stok'] ?> </h5>
                    </div>
                    <div class="description">
                        <p><?php echo $fetch_product['detail_produk']; ?></p>
                    </div>
                </div>
            </div>
            <?php require "navbarbotom.php"; ?>
        </section>
    </div>
</body>

</html>