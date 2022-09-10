<?php include "includes/functions.php"; ?>

<?php

if (isset($_POST['submit'])) {

	updaterow();
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

<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UpdatePromosi Slider</title>
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
	<div class="container mt-5">
		<ol class="breadcrumb">
			<li class="breadcrumb-item" aria-current="page">
				<a href="../journeyadmin/index.php" class="no-decoration text-muted"><i class="fas fa-home"></i> Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<i class="fa-solid fa-square-rss"></i> Update
			</li>
		</ol>
	</div>

	<div class="container w-25 mt-5">
		<div class="h1 text-primary">PREVIEW</div>
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
	<div class="container">
		<form action="update.php" method="post" enctype="multipart/form-data">
			<div class="jumbotron bg-dark mt-5">
				<div class="form-group  ">


					<div class="text-center h1 text-white">Update image</div>
					<div class="row mt-5">
						<div class="col-md-2 container">
							<div class="text-warning">SELECT ROW :
								<select name="id" id="">

									<?php

									showalldata();

									?>


								</select>
							</div>
						</div>
						<div class="col-md-6">
							<input type="file" name="image" class="bg-primary p-2">
						</div>


					</div>
					<div class="row justify-content-around container pl-5 pr-5 mt-5">

						<a href="create.php" class="btn btn-warning d-block w-50">Create</a>

						<input type="submit" name="submit" value="Update" class="btn btn-success d-block w-50">

					</div>
				</div>
			</div>


		</form>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>