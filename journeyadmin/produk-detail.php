<?php
require "session.php";
require "../koneksi.php";

$id_produk = $_GET['d'];
$queryKategori = mysqli_query($mysqli, "SELECT * FROM kategori");


$query = mysqli_query($mysqli, "SELECT a.*, b.nama AS kategori FROM produk a JOIN kategori b ON a .kategori_id=b.id WHERE a.id_produk='$id_produk'");
$data = mysqli_fetch_array($query);

$queryKategori = mysqli_query($mysqli, "SELECT * FROM kategori WHERE id='$data[kategori_id]'");

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
    <title>Produk Detail</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
        <h2>Detail Produk</h2>

        <div class="col-12 col-mid-6 mb-5">
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="nama_produk">Nama</label>
                    <input type="text" id="nama_produk" name="nama_produk" value="<?php echo $data['nama_produk'] ?>" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['kategori']; ?></option>
                        <?php
                        while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                        ?>
                            <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="harga_produk">Harga</label>
                    <input type="number" name="harga_produk" class="form-control" value="<?php echo $data['harga_produk']; ?>" autocomplete="off" required>
                </div>
                <div>
                    <label for="currentFoto">Foto Produk Sekarang</label>
                    <img src="uploads/<?php echo $data['foto_produk'] ?>" alt="" width="300px">
                </div>
                <div>
                    <label for="foto_produk">Ubah Foto Produk</label>
                    <input type="file" name="foto_produk" id="foto_produk" class="form-control">
                </div>
                <div>
                    <label for="detail_produk">Detail</label>
                    <textarea name="detail_produk" id="detail_produk" cols="30" rows="10" class="form-control">
                        <?php echo $data['detail_produk']; ?>
                    </textarea>
                </div>
                <div>
                    <label for="ketersediaan_stok">ketersediaan_stok</label>
                    <input type="number" name="ketersediaan_stok" id="ketersediaan_stok" class="form-control" value="<?php echo $data['ketersediaan_stok']; ?>" required>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                    <button type="submit" class="btn btn-primary" name="hapus">Delete</button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST['update'])) {
            $nama_produk = ($_POST['nama_produk']);
            $kategori = ($_POST['kategori']);
            $harga_produk = ($_POST['harga_produk']);
            $detail_produk = ($_POST['detail_produk']);
            $ketersediaan_stok = ($_POST['ketersediaan_stok']);

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
                $queryUpdate = mysqli_query($mysqli, "UPDATE produk SET kategori_id='$kategori', nama_produk='$nama_produk', harga_produk='$harga_produk', detail_produk='$detail_produk', ketersediaan_stok='$ketersediaan_stok' WHERE id_produk='$id_produk'");

                if ($nama_file != '') {
                    if ($image_size > 1000000000) {
                ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Image tidak boleh lebih dari 10Mb
                        </div>
                        <?php
                    } else {
                        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                        ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File wajib bertipe jpg, png, dan gif
                            </div>
                            <?php
                        } else {
                            move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_dir . $new_name);

                            $queryUpdate = mysqli_query($mysqli, "UPDATE produk SET foto_produk='$new_name' WHERE id_produk='$id_produk'");
                            $jumlahData = mysqli_num_rows($query);

                            if ($queryUpdate) {
                            ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    Produk Berhasil DiUpdate
                                </div>

                                <meta content="2; url=produk.php" http-equiv="refresh" />
                <?php
                            } else {
                                echo mysqli_error($mysqli);
                            }
                        }
                    }
                }
            }
        }

        if (isset($_POST['hapus'])) {
            $queryHapus = mysqli_query($mysqli, "DELETE FROM produk WHERE id_produk='$id_produk'");

            if ($queryHapus) {
                ?>
                <div class="alert alert-primary mt-3" role="alert">
                    Produk Berhasil DiHapus
                </div>

                <meta http-equiv="refresh" content="2; url=produk.php" />
        <?php
            }
        }
        ?>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>