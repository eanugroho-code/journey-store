<?php require 'koneksi.php'; ?>
<?php
$keyword = $_GET["keyword"];

$alldata = array();
$query = mysqli_query($mysqli, "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR detail_produk LIKE '%$keyword%'");
while ($pecah = $query->fetch_assoc()) {
    $alldata[] = $pecah;
}

// echo "<pre>";
// print_r($alldata);
// echo "</pre>";
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


<body>
    <div class="main m-auto">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <a href="index.php"><img src="image/headerjo.png" width="47px" height="50px" padding="0" alt=""></a>

            </div>
            <h2 class="text-brand">
                Journey <span>Store</span>
            </h2>
        </div>
        <br>
        <!-- <a href="#">
            <button class="btn-floating">
                <i class='bx bx-search-alt-2' style='color:#07a451'></i>
                <span>
                    <form action="floating-search.php" method="get" class="search-form">
                        <input type="text" class="form-control" name="keyword">
                    </form>
                </span>
            </button>
        </a> -->
        <br>
        <br>

        <div class="container">
            <h5>Hasil Pencarian : <?php echo $keyword ?></h5>
            <?php if (empty($alldata)): ?>
                <div class="alert alert-danger text-center">Maaf! Produk <strong><?php echo $keyword ?></strong> tidak ada</div>
            <?php endif ?>
            <div class="wrap-swift d-flex mt-5">
                <?php foreach ($alldata as $key => $value): ?>
                <div class="card">
                    <i>
                        <a href="detail-produk.php?id=<?php echo $value["id_produk"]; ?>"><img src="journeyadmin/uploads/<?php echo $value['foto_produk']; ?>" width="auto" class="card-img-top" alt=""></a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $value['nama_produk']; ?></h5>
                            <p class="card-text">Rp.<?php echo $value['harga_produk']; ?></p>
                            Tersedia <?php echo $value['ketersediaan_stok']; ?>
                        </div>
                        <div class="wrap-shop d-flex align-items-center">
                            <a href="beli.php?id=<?php echo $value['id_produk']; ?>"><img src="assets/icon-shop2.png"></a>
                        </div>
                    </i>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <section>
            <?php require "navbarbotom.php"; ?>
        </section>
    </div>

</body>

</html>