<?php
require 'koneksi.php';
session_start();
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
                Riwayat <span>Belanja</span>
                <?php echo $_SESSION['nama_pelanggan']; ?>
            </h2>
        </div>
        <section class="riwayat">
            <div class="container">
                <h3>All Transaction </h3>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-white bg-dark">No</th>
                            <th class="text-white bg-dark">Tanggal</th>
                            <th class="text-white bg-dark">Status</th>
                            <th class="text-white bg-dark">Total</th>
                            <th class="text-white bg-dark">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        $id_pelanggan = $_SESSION['id_pelanggan'];
                        $query = mysqli_query($mysqli, "SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                        while ($data = mysqli_fetch_array($query)) {;

                        ?>
                            <tr>
                                <td class="text-white bg-dark"><?php echo $nomor; ?></td>
                                <td class="text-white bg-dark"><?php echo $data["tanggal_pembelian"] ?>
                                    <br>
                                    Di Proses Oleh : <?php echo $data["team_proses"]?>
                                </td>
                                <td class="text-white bg-dark"><?php echo $data["status_pembelian"] ?></td>
                                <td class="text-white bg-dark">Rp. <?php echo number_format($data["total_pembelian"]) ?></td>
                                <td class="text-white bg-dark">
                                    <a href="nota.php?id=<?php echo $data["id_pembelian"] ?>" class="btn btn-info">Nota</a>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </section>
        <br>
        <br>
        <div>
            <?php require "navbarbotom.php"; ?>
        </div>
    </div>
</body>

</html>