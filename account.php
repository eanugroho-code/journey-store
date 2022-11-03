<?php

require 'koneksi.php';
session_start();
$id = $_SESSION['id_pelanggan'];




$query = mysqli_query($mysqli, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Journey Store</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

</head>
<style>
    .no-decoration {
        text-decoration: none;
    }

    form div {
        width: 200px;
    }
</style>

<body>

    <div class="main m-auto">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <img src="image/headerjo.png" width="47px" height="50px" padding="0" alt="">

            </div>
            <h2 class="text-brand">
                Journey <span>Store</span>
            </h2>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        <a href="riwayat.php"><i class='bx bx-package bx-tada bx-rotate-180'> Riwayat Transaksi
                            </i></a>
                    </div>
                </div>
                <div class="col">
                    <div class="alert alert-warning" role="alert">
                        <?php if (isset($_SESSION["id_pelanggan"])) : ?>
                            <li><i class='bx bx-log-out'> <a href="logout.php"> Logout </a> </i></li>
                        <?php else : ?>
                            <li><i class='bx bx-log-in'> <a href="login.php"> Login </a> </i></li>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col">
                    <div class="alert alert-success" role="alert">
                        <a href=""><i class='bx bx-send bx-fade-right'>Proses Pesanan</i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <?php if (empty($_SESSION["id_pelanggan"]) or !isset($_SESSION["id_pelanggan"])) {
            ?>
                <div class="alert alert-info mt-3" role="alert">
                    silahkan login terlebih dahulu untuk melihat riwayat transaksi mu ...
                </div>

            <?php
                // echo "<script>alert('silahkan login terlebih dahulu untuk melihat riwayat transaksi mu');</script>";
            } ?>
            <h2>Info Profil</h2>
            <br>
            <div class="col-12">

                <form action="" method="post">
                    <div>
                        <label for="name">Username</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $data['nama_pelanggan']; ?>" disabled readonly>
                    </div>
                    <br>
                    <div>
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $data['email_pelanggan']; ?>" disabled readonly>

                    </div>
                    <br>
                    <div>
                        <label for="alamat">Alamat</label>
                        <textarea type="text" class="form-control" placeholder="<?php echo $data['alamat_pelanggan']; ?>" id="address" style="height: 100px" disabled readonly><?php echo $data['alamat_pelanggan']; ?></textarea>
                    </div>
                    <br>
                    <div>
                        <label for="whatsapp">WhatsApp</label>
                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="<?php echo $data['whatsapp_pelanggan']; ?>" disabled readonly>
                    </div>
                    <br>
                    <br>
                </form>

            </div>
        </div>


        <br>
        <?php require "navbarbotom.php"; ?>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

</body>

</html>