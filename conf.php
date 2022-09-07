<?php
phpinfo();
?>
?v=<?php echo time(); ?>

<!-- daata member -->
<?php
require "session.php";
require "../koneksi.php";

$queryuserinfo = mysqli_query($mysqli, "SELECT * FROM user_info");
$jumlahuserinfo = mysqli_num_rows($queryMember);
?>

<!-- add to cart -->
if (isset($_POST['add_to_cart'])) {

$product_name = $_POST['nama'];
$product_price = $_POST['harga'];
$product_image = $_POST['foto'];
$product_quantity = $_POST['quantity'];

$select_cart = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE nama = '$product_name' AND user_id = '$user_id'") or die('query failed');

if (mysqli_num_rows($select_cart) > 0) {
$message[] = 'product already added to cart!';
} else {
mysqli_query($mysqli, "INSERT INTO `cart`(user_id, nama, harga, foto, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
$message[] = 'product added to cart!';
header('location:cart.php');
}
};