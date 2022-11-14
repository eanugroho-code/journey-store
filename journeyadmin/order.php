<?php
require "session.php";
require "../koneksi.php";
?>
<?php 
    $semuadata=array();
    if(isset($_POST["kirim"]))
    {
        $tgl_mulai = $_POST["tglm"];
        $tgl_selesai = $_post['tgls'];
        $mysqli->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
        while($pecah = $ambil->fetch_assoc())
        {
            $semuadata[]=$pecah;
        }
        echo "<pre>";
        print_r ($semuadata);
        echo "</pre>";
    }
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
                <li class="breadcrumb-item active" aria-current="page">Data Pesanan</li>
            </ol>
        </nav>

        <form action="post">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tglm">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tgls">
                    </div>
                </div>
                <div class="col-md-2">
                    <label>&nbsp;</label><br>
                    <button class="btn btn-primary" name="kirim">Lihat</button>
                </div>
            </div>
        </form>


        <div class="mt-3 mb-5">
            <h2>Data Pesanan</h2>
            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>No WhatsApp</th>
                            <th>alamat</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $total; ?>
                        <?php $nomor = 1; ?>
                        <?php $ambil = $mysqli->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
                        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                            <?php $total+=$pecah['total_pembelian'] ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah['nama_pelanggan']; ?></td>
                                <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                                <td><?php echo $pecah['whatsapp_pelanggan']; ?></td>
                                <td><?php echo $pecah['alamat_pelanggan']; ?></td>
                                <td><?php echo $pecah['total_pembelian']; ?></td>
                                <td><?php echo $pecah['status_pembelian'];?></td>


                                <td>
                                    <a href="order-detail.php?o=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">detail</a>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">total_pembelian</th>
                            <th>Rp. <?php echo number_format($total) ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>



        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>