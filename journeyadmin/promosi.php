<?php include "includes/functions.php"; ?>

<?php

if (isset($_POST['submit'])) {

    createrow();
}


$sql = "SELECT * FROM slides order by id desc limit 4";

$query = mysqli_query($conn, $sql);

$li = "";
$i = 0;


$div = "";
while ($row = mysqli_fetch_array($query)) {

    if ($i == 0) {


        $li .= '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '" class="active"></li>';

        $div .= '<div class="carousel-item active">
      <img src="images/' . $row['image'] . '" class="d-block w-100" alt="...">
    ';
    } else {
        $li .= '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>';

        $div .= '<div class="carousel-item ">
      <img src="images/' . $row['image'] . '" class="d-block w-100" alt="...">
    ';
    }

    $div .= '</div>';

    $i++;
}




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

    .image {
        border-radius: 150px;
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
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php echo $li; ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php echo $div; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="promosi.php" method="post" enctype="multipart/form-data">
                <div class="jumbotron bg-dark mt-5">
                    <div class="text-center h1 text-white">Insert image</div>
                    <div class="row justify-content-around mt-5">
                        <input type="file" name="image" class="bg-primary p-2">
                    </div>
                    <div class="row justify-content-around container pl-5 pr-5 mt-5">
                        <a href="update.php" class="btn btn-warning d-inline w-50">Update</a>
                        <input type="submit" name="submit" value="Create" class="btn btn-success d-block w-50">
                    </div>
                </div>
            </form>
        </div>
    </div>





    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>