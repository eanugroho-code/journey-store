<?php

require 'koneksi.php';
session_start();
if (!isset($_SESSION["id_pelanggan"])) {
    echo "<script>alert ('silahkan login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
}
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
    <title>Checkout</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>

<body>
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between align-items-center">
            <img src=" image/headerjo.png" width="47px" height="50px" padding="0">

        </div>
        <a href="index.php">
            <h2 class="text-brand">
                Journey <span>Store</span>
            </h2>
        </a>
    </div>

    <section class="konten">
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
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                        <?php
                        $ambil = $mysqli->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah["harga_produk"] * $jumlah;

                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["nama_produk"]; ?><br><?php echo $pecah["detail_produk"]; ?></td>
                            <td><?php echo number_format($pecah["harga_produk"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo number_format($subharga); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php $totalbelanja += $subharga; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total</th>
                        <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                    </tr>
                </tfoot>
            </table>
            <div class="alert alert-warning mt-3" role="alert">
                <marquee scrolldelay="100" title="Ini Muncul Saat Hover">Pastikan Nama, Alamat dan No. Whatsapp benar "kami akan langsung menghubungi mu ..."</marquee>
            </div>
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $data["nama_pelanggan"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $data["whatsapp_pelanggan"] ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="col">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $data["alamat_pelanggan"] ?>" class="form-control">
                    </div>
                </div>
                <br>
                <button class="btn btn-primary" name="checkout">Order</button>

            </form>

            <?php
            if (isset($_POST["checkout"])) {
                $id = $_SESSION["id_pelanggan"];
                $tanggal_pembelian = date("Y-m-d");
                $total_pembelian = $totalbelanja;

                $mysqli->query("INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,total_pembelian) VALUES('$id','$tanggal_pembelian','$total_pembelian')");
                $id_pembelian_barusan = $mysqli->insert_id;

                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                    $mysqli->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah_produk) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah') ");

                    $mysqli->query("UPDATE produk SET ketersediaan_stok=ketersediaan_stok -$jumlah WHERE id_produk='$id_produk'");

                    // $mysqli->query("UPDATE pembelian SET status_pembelian='orderan mu sedang diproses' WHERE id_pembelian='id'");
                }
                unset($_SESSION["keranjang"]);
                echo  "<script>alert ('pembelian sukses');</script>";
                echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
            }
            ?>
        </div>
    </section>

    <!-- <pre><?php var_dump($id);
                echo "<pre>";
                print_r($data);
                echo "</pre>"; ?> </pre>
    <pre><?php print_r($_SESSION["keranjang"]) ?></pre> -->
</body>

</html>