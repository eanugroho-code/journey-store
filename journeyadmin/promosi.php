<?php
require "../koneksi.php";

$msg = '';

if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $path = 'uploads/' . $image;

    $sql = $mysqli->query("INSERT INTO slider (image_path) VALUES ('$path')");

    if ($sql) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $msg = 'Image Uploaded Successfully !';
    } else {
        $msg = 'Image Upload Failed!';
    }
}

$result = $mysqli->query("SELECT image_path FROM slider");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promosi Slider</title>
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
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="../journeyadmin/index.php" class="no-decoration text-muted"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-square-rss"></i> Promosi
            </li>
        </ol>
    </div>


    <h2 class="text-center">
        Slider Promosi
    </h2>

    <div class="container-fluid">
        <div class="row justify-content-center mb-2">
            <div class="col-lg-10">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php 
                        $i = 0;
                        foreach ($result as $row){
                            $actives = '';
                            if($i == 0){
                                $actives = 'active';
                            }
                        ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></button>
                        <?php $i++; } ?>
                    </div>
                    <div class="carousel-inner">
                    <?php 
                        $i = 0;
                        foreach ($result as $row){
                            $actives = '';
                            if($i == 0){
                                $actives = 'active';
                            }
                        ?>
                        <div class="carousel-item <?= $actives; ?>">
                            <img src="<?= $row['image_path']?>" class="d-block w-100">
                        </div>

                        <?php $i++; } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 bg-dark rounded px-4">
                <div class="text-center p-1">
                    <h4 class="text-center text-light p-1">Select Image To Upload !</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="image" class="form-control p-1" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="upload" class="btn btn-warning btn-block" value="Upload Image">
                        </div>
                        <div class="form-group">
                            <h5 class="text-center tect-light"><?= $msg; ?></h5>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>