<?php

require 'koneksi.php';
session_start();
$id = $_SESSION['id'];

if (!isset($id)) {
   header('location:index.php');
};

if (isset($_GET['logout'])) {
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

include "journeyadmin/includes/db.php";
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

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <?php
      $select_user = mysqli_query($mysqli, "SELECT * FROM `user_info` WHERE id = '$id'") or die('query failed');
      if (mysqli_num_rows($select_user) > 0) {
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
      ?>
      <div class="d-flex justify-content-between align-items-center">
         <div class="d-flex justify-content-between align-items-center">
            <i class='bx bxs-store-alt'></i>
            <h2 class="text-brand">
               Journey <span>Store</span>
            </h2>
         </div>
         <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Kamu ingin meninggalkan halaman ini ? ');" class="delete-btn">
            <h3>Hi, <?php echo $fetch_user['name']; ?></h3>
         </a>
      </div>

      <?php require "promosi.php"; ?>
      <!-- popup -->
      <div class="popup">
         <div class="popup_content">
            <img class="popup_image" src="popup/20220910_013803.png" width="300px" alt="Popup">
            <img class="popup_close" src="popup/icon-close.png" alt="Close">
         </div>
      </div>

      <section class="shop container mt-15">
         <h5 class="section-title">Shop Products</h5>
         <div class="shop-content">
            <div class="product-box">
               <?php
               $select_product = mysqli_query($mysqli, "SELECT * FROM `produk`") or die('query failed');
               if (mysqli_num_rows($select_product) > 0) {
                  while ($fetch_product = mysqli_fetch_assoc($select_product)) {
               ?>
                     <img src="journeyadmin/uploads/<?php echo $fetch_product['foto']; ?>" width="150px" alt="" class="product-img">
                     <h4 class="product-title"><?php echo $fetch_product['nama']; ?></h4>
                     <span class="price">Rp.<?php echo $fetch_product['harga']; ?></span>
                     <i class="bx bx-shopping-bag add-cart"></i>
            </div>
      <?php
                  };
               };
      ?>
         </div>
      </section>
   </div>
   <!-- <header>

      <div class="nav container">
         <a href="#" class="logo">Hai </a>

         <i class="bx bx-shopping-bag" id="cart-icon"></i>
      </div>
   </header> -->



   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="fontawesome/js/all.min.js"></script>
   <script>
      var popup = document.querySelector(".popup");
      var close = document.querySelector(".popup_close");
      setTimeout(function() {
         popup.classList.add("popup--show");
      }, 1000);

      close.addEventListener("click", function() {
         console.log("kil dismis")
         popup.classList.remove("popup--show");
         popup.classList.add("popup--close");
         alert("Selamat datang, Kak <?php echo $fetch_user['name']; ?>!  -SELAMAT BERBELANJA UNTUK MEMENUHI KEBUTUHAN TOKO MU, Semoga Hari Mu Menyenangkan !");
      })
   </script>
</body>

</html>