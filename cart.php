<?php
session_start();
require 'koneksi.php';

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";
$_SESSION['pelanggan'];

if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('keranjang kosong, silahkan pilih produk');</script>";
    echo "<script>location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCart</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <!-- custom css file link  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</head>
<style>
    .no-decoration {
        text-decoration: none;
    }
</style>

<body>

    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between align-items-center">
            <img src="image/headerjo.png" width="47px" height="50px" padding="0" alt="">

        </div>
        <h2 class="text-brand">
            Journey <span>Store</span>
        </h2>
    </div>

    <section class="kontent">
        <div class="container">
            <h1>My Cart</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                        <?php
                        $ambil = $mysqli->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah["harga_produk"] * $jumlah;
                        // echo "<pre>";
                        // print_r($pecah);
                        // echo "</pre>";
                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["nama_produk"]; ?><br><?php echo $pecah["detail_produk"]; ?></td>
                            <td><?php echo number_format($pecah["harga_produk"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo number_format($subharga); ?></td>
                            <td>
                                <a href="cart_delete.php?id=<?php echo $id_produk ?>">
                                    <box-icon name='trash' animation='tada-hover' style='color:#e80101'>
                                        <i class='bx bxs-trash bx-tada-hover bx-xs'></i>
                                    </box-icon>
                                </a>
                                <br>
                                <br>
                                <a href="#">
                                    <box-icon name='search-alt' animation='tada'>
                                        <i class='bx bx-search-alt bx-tada-hover bx-xs'></i>
                                    </box-icon>
                                </a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="checkout.php" class="btn btn-success">Checkout</a>
            <a href="index.php" class="btn btn-info">Tambah Item</a>

        </div>
        <br>
        <br>
        <br>
        <br>
        <?php require "navbarbotom.php"; ?>
    </section>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>


</html>