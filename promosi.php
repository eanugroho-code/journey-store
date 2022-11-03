<?php
include "koneksi.php";

$sql = "SELECT * FROM slides order by id desc limit 4";

$query = mysqli_query($conn, $sql);

$li = "";
$i = 0;


$div = "";
while ($row = mysqli_fetch_array($query)) {

  if ($i == 0) {


    $li .= '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '" class="active"></li>';

    $div .= '<div class="carousel-item active">
      <img src="journeyadmin/images/' . $row['image'] . '" class="d-block w-100" alt="...">
    ';
  } else {
    $li .= '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>';

    $div .= '<div class="carousel-item ">
      <img src="journeyadmin/images/' . $row['image'] . '" class="d-block w-100" alt="...">
    ';
  }

  $div .= '</div>';

  $i++;
}



?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>hello</title>
</head>

<style>
  carousel {
    width: auto;
    height: 150px;
    box-shadow: 0px 5px 20px #1ac584;
  }
</style>


<body>
  <div class="container mt-4">
    <div id="carouselExampleIndicators" class="carousel slide h-100" data-ride="carousel">
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

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>