<?php
session_start();
$id_produk = $_GET['id'];
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('produk dihapus ddari keranjang');</script>";
echo "<script>location='cart.php';</script>";
