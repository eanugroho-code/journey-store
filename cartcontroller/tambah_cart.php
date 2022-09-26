
<?php
include "../koneksi.php";

$id = $_GET['id'];
$sql = "SELECT * FROM 'produk' =" . $id;
$query = mysqli_query($mysqli, $sql);
$hasil = mysqli_fetch_object($query);
$_SESSION[$id] = [
    "nama" => $hasil->nama,
    "harga" => $hasil->harga,
    "jumlah" => 1
];
echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='cart.php'</script>";
?>
