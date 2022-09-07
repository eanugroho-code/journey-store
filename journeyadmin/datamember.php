<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../journeyadmin/" class="no-decoration text-muted">
                        <i class="fa-solid fa-house"></i> Home </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Data Member</li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3>Data Member</h3>

            <form action="" method="post">
                <div>
                    <label for="datamember">Pencarian</label>
                    <input type="text" id="datamember" name="datamember" placeholder="input no whatsapp member" class="form-control">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Cari</button>
                </div>
            </form>


            <div class="mt-3">
                <h2>List Member</h2>

                <div class="table-responsive mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($jumlahKategori == 0) {
                            ?>
                                <tr>
                                    <td colspan=3 class="text-center">Tidak Ada Data</td>
                                </tr>
                                <?php
                            } else {
                                $jumlah = 1;
                                while ($data = mysqli_fetch_array($queryKategori)) {
                                ?>
                                    <tr>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td>
                                            <a href="kategori-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                    $jumlah++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>