<?php
require "session.php";
require "../koneksi.php";

$query = mysqli_query($mysqli, "SELECT a.*, b.nama AS kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
$jumlahProduk = mysqli_num_rows($query);

$queryKategori = mysqli_query($mysqli, "SELECT * FROM kategori");

function generateRandomString($length = 25)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
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
                    <a href="../journeyadmin/index.php" class="no-decoration text-muted"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-box"></i> Produk
                </li>
            </ol>
        </nav>

        <!--Tambah Produk-->
        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Produk</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="nama_produk">Nama</label>
                    <input type="text" id="nama_produk" name="nama_produk" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">Pilih Salah Satu</option>
                        <?php
                        while ($data = mysqli_fetch_array($queryKategori)) {
                        ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="harga_produk">Harga</label>
                    <input type="number" name="harga_produk" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="foto_produk">Foto wajib <h1>ukuran 1600x1600</h1> </label>
                    <input type="file" name="foto_produk" id="foto_produk" class="form-control">
                </div>

                <div>
                    <label for="detail_produk">Detail</label>
                    <textarea name="detail_produk" id="detail_produk" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div>
                    <label for="ketersediaan_stok">ketersediaan_stok</label>
                    <input type="number" name="ketersediaan_stok" id="ketersediaan_stok" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan'])) {
                $nama_produk = htmlspecialchars($_POST['nama_produk']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $harga_produk = htmlspecialchars($_POST['harga_produk']);
                $detail_produk = htmlspecialchars($_POST['detail_produk']);
                $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                $target_dir = "uploads/";
                $nama_file = basename($_FILES["foto_produk"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES["foto_produk"]["size"];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;




                if ($nama_produk == '' || $kategori == '' || $harga_produk == '' || $ketersediaan_stok == '') {
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Nama, Kategori, Harga, dan Stok Wajib Diisi!
                    </div>
                    <?php
                } else {
                    if ($nama_file != '') {
                        if ($image_size > 100000000) {
                    ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                Image tidak boleh lebih dari 10Mb
                            </div>
                            <?php
                        } else {
                            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    File wajib bertipe jpg, png
                                </div>
                        <?php
                            } else {
                                move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_dir . $new_name);
                            }
                        }
                    }

                    //query insert to produk table
                    $queryTambah = mysqli_query($mysqli, "INSERT INTO produk ( nama_produk, kategori_id, harga_produk, foto_produk, detail_produk, ketersediaan_stok) VALUES ( '$nama_produk', '$kategori', '$harga_produk', '$new_name', '$detail_produk', '$ketersediaan_stok')");

                    if ($queryTambah) {
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Produk Berhasil Tersimpan
                        </div>

                        <meta http-equiv="refresh" content="2; url=produk.php" />
            <?php
                    } else {
                        echo mysqli_error($mysqli);
                    }
                }
            }

            ?>

        </div>

        <div class="mt-3 mb-5">
            <h2>List Produk</h2>
            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Ketersediaan Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlahProduk == 0) {
                        ?>
                            <tr>
                                <td colspan="6" class="text-center">Data Produk tidak tersedia</td>
                            </tr>
                            <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $data['nama_produk']; ?></td>
                                    <td><?php echo $data['kategori']; ?></td>
                                    <td><?php echo $data['harga_produk']; ?></td>
                                    <td><?php echo $data['ketersediaan_stok']; ?></td>
                                    <td>
                                        <a href="produk-detail.php?d=<?php echo $data['id_produk']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
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