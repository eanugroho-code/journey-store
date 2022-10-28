<?php
session_start();
require 'koneksi.php';
$id = $_SESSION['id_pelanggan'];

$query = mysqli_query($mysqli, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$data = mysqli_fetch_array($query);




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
    .main {
        font-family: "Times New Roman", Times, serif;

    }

    .no-decoration {
        text-decoration: none;
    }


    h5 {
        font-size: 50%;
    }
</style>

<body>
    <div class="main">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <img src="image/headerjo.png" width="47px" height="50px" padding="0" alt="">
            </div>
            <h2 class="text-brand">
                Journey <span>Store</span>
            </h2>
        </div>




        <section class="konten">
            <div class="container">
                <div class="mt-3 mb-5">
                    <h2>Nota Pesanan</h2>
                    <?php
                    $ambil = $mysqli->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
                    $detail = $ambil->fetch_assoc();
                    ?>
                    <!-- <h1>data user membeli</h1>
                    <pre><?php print_r($detail) ?></pre>
                    <h1>data</h1>
                    <pre><?php print_r($_SESSION) ?></pre> -->
                    <br>

                    <?php
                    $idpelangganyangbeli = $detail['$_SESSION']["id_pelanggan"];
                    $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];
                    if ($idpelangganyangbeli !== $idpelangganyanglogin) {
                        echo "<script>alert('jangan nakal');</script>";
                        echo "<script>location='riwayat.php';</script>";
                        exit();
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Pembelian</h3>

                            <strong>No.Pembelian:<?php echo $detail['id_pembelian'] ?></strong>
                            <p>
                                <?php echo $detail["tanggal_pembelian"] ?><br>
                                Rp. <?php echo $detail["total_pembelian"] ?>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h3>Pelanggan</h3>
                            <strong><?php echo $detail["nama_pelanggan"] ?></strong><br>
                            <p>
                                <?php echo $data["whatsapp_pelanggan"] ?><br>
                                <?php echo $data["email_pelanggan"] ?>
                            </p>
                        </div>
                    </div>
                    <div class="alert alert-info mt-3" role="alert">
                        <h3>Alamat Pengiriman</h3><br>
                        <strong>Alamat :<?php echo $data["alamat_pelanggan"] ?></strong>
                    </div>
                    <div class="table-responsive mt-5">
                        <div class="col-12 col-mid-6 mb-5">
                            <form action="" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-white bg-dark">No</th>
                                            <th class="text-white bg-dark">Nama Produk</th>
                                            <th class="text-white bg-dark">Harga</th>
                                            <th class="text-white bg-dark">Jumlah</th>
                                            <th class="text-white bg-dark">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php $totalbelanja = 0; ?>
                                        <?php $ambil = $mysqli->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
                                        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td class="text-white bg-dark"><?php echo $nomor; ?></td>
                                                <td class="text-white bg-dark"><?php echo $pecah['nama_produk']; ?></td>
                                                <td class="text-white bg-dark"><?php echo $pecah['harga_produk']; ?></td>
                                                <td class="text-white bg-dark"><?php echo $pecah['jumlah_produk']; ?></td>
                                                <td class="text-white bg-dark"><?php echo $pecah['harga_produk'] * $pecah['jumlah_produk']; ?></td>
                                            </tr>
                                            <?php $nomor++; ?>
                                            <?php $totalbelanja += $pecah['harga_produk'] * $pecah['jumlah_produk']; ?>

                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-white bg-dark" colspan="4">Total</th>
                                            <th class="text-white bg-dark">Rp. <?php echo number_format($totalbelanja) ?></th>
                                        </tr>
                                    </tfoot>

                                </table>

                            </form>
                            <h5>*SILAHKAN MEMBAYAR KEPADA KURIR KAMI SETELAH BARANG SAMPAI.</h5>

                        </div>
                    </div>
                </div>

            </div>
            <div class="position-relative">
                <div class="position-absolute  bottom-0 end-0">
                    <h6>Hormat Kami</h6>
                    <img src="image/headerjo.png" width="100px" height="70px" alt="">
                </div>
            </div>
            <br>
            <br>
            <br>
            <div>
                <?php require "navbarbotom.php"; ?>
            </div>
        </section>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>


</html>