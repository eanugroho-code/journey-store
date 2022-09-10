<?php include "includes/db.php" ?>
    
<?php

function showalldata()
{


	global $conn;

	$query = "SELECT * FROM slides";
	$result = mysqli_query($conn, $query);

	if (!$result) {

		die('Query Faild');
	}
	while ($row = mysqli_fetch_assoc($result)) {

		$id = $row['id'];

		echo "<option value ='$id'>$id</option>";
	}
}


// CREATE ROW FUNCTIONS /*( insert image files to database > function status : working  )*/


function createrow()
{

	global $conn;

	$image_name = $_FILES['image']['name'];
	$image_type = $_FILES['image']['type'];
	$image_size = $_FILES['image']['size'];
	$image_tmp  = $_FILES['image']['tmp_name'];
	move_uploaded_file($image_tmp, "images/$image_name");

	$query = "INSERT INTO slides (image) VALUES ('$image_name') ";
	$result = mysqli_query($conn, $query);

	if (!$result) {

		die('Query Faild');
	} else {
		echo "<div class='alert alert-success container text-center' role='alert'>
  RECORD CREATED SUCCESSFULLY !
</div>";

		echo '<meta http-equiv="refresh" content="2; url=promosi.php">';
	}
}


// UPDATE ROW FUNCTIONS

function updaterow()
{

	global $conn;

	$image_name = $_FILES['image']['name'];
	$image_type = $_FILES['image']['type'];
	$image_size = $_FILES['image']['size'];
	$image_tmp  = $_FILES['image']['tmp_name'];
	move_uploaded_file($image_tmp, "updated/$image_name");

	$id = $_POST['id'];

	$query = "UPDATE slides SET image = '$image_name'  WHERE id = '$id'";

	$result = mysqli_query($conn, $query);

	if (!$result) {

		die('Query Faild' . mysqli_error($conn));
	} else {
		echo "<div class='alert alert-success container text-center' role='alert'>
  RECORD UPDATED SUCCESSFULLY !
</div>";
		echo '<meta http-equiv="refresh" content="2; url=update.php">';
	}
}


?>

