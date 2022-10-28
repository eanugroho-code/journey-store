<?php

require "../koneksi.php";

$id = $_GET['o'];

$ambil = $mysqli->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <h2>detail pesanan</h2>

        <div class="col-12 col-mid-6 mb-5">
            <form action="" enctype="multipart/form-data">
                <br><br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php $totalbelanja = 0; ?>
                        <?php $ambil = $mysqli->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[o]'"); ?>
                        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah['nama_produk']; ?></td>
                                <td><?php echo $pecah['harga_produk']; ?></td>
                                <td><?php echo $pecah['jumlah_produk']; ?></td>
                                <td><?php echo $pecah['harga_produk'] * $pecah['jumlah_produk']; ?></td>
                            </tr>
                            <?php $nomor++; ?>
                            <?php $totalbelanja += $pecah['harga_produk'] * $pecah['jumlah_produk']; ?>

                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Total</th>
                            <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                        </tr>
                    </tfoot>
                </table>

            </form>

        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>