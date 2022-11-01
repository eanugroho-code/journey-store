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
    <div class="main">
        <?php require "navbarbotom.php"; ?>

        <section class="kontent">
            <div class="container">
                <h1>My Cart</h1>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-white bg-dark">No.</th>
                            <th class="text-white bg-dark">Produk</th>
                            <th class="text-white bg-dark">Hrg</th>
                            <th class="text-white bg-dark">Jmlh</th>
                            <th class="text-white bg-dark">Sub</th>
                            <th class="text-white bg-dark">Aksi</th>
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
                                <td class="text-white bg-dark"><?php echo $nomor; ?></td>
                                <td class="text-white bg-dark"><?php echo $pecah["nama_produk"]; ?></td>
                                <td class="text-white bg-dark text-center"><?php echo number_format($pecah["harga_produk"]); ?></td>
                                <td class="text-white bg-dark text-center"><?php echo $jumlah; ?></td>
                                <td class="text-white bg-dark text-center"><?php echo number_format($subharga); ?></td>
                                <td class="text-center">
                                    <a href="cart_delete.php?id=<?php echo $id_produk ?>">
                                        <box-icon name='trash' animation='tada-hover' style='color:#e80101'>
                                            <i class='bx bxs-trash bx-tada-hover bx-xs'></i>
                                        </box-icon>
                                    </a>
                                    <br>
                                    <a href="cart-detail.php?id=<?php echo $pecah["id_produk"]; ?>">
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

        </section>
    </div>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>


</html>