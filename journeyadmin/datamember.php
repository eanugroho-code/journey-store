<?php
require "session.php";
require "../koneksi.php";
?>

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

    form div {
        margin-bottom: 10px;
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




        <div class="mt-3 mb-5">
            <h2>List User</h2>
            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">email</th>
                            <th scope="col">address</th>
                            <th scope="col">whatsapp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `pelanggan`";
                        $result = mysqli_query($mysqli, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $nama_pelanggan = $row['nama_pelanggan'];
                                $email_pelanggan = $row['email_pelanggan'];
                                $alamat_pelanggan = $row['alamat_pelanggan'];
                                $whatsapp_pelanggan = $row['whatsapp_pelanggan'];
                                echo '<tr>
                                    <td>' . $nama_pelanggan . '</td>
                                    <td>' . $email_pelanggan . '</td>
                                    <th>' . $alamat_pelanggan . '</th>
                                    <th>' . $whatsapp_pelanggan . '</th>                                   
                                    </tr>';
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>



        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>