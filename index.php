<?php

require 'koneksi.php';
session_start();
$id = $_SESSION['id_pelanggan'];

// if (!isset($id)) {
//    header('location:index.php');
// };

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
      <img src="journeyadmin/images/' . $row['image'] . '" class="d-block w-100" alt="...">';
   } else {
      $li .= '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>';

      $div .= '<div class="carousel-item ">
      <img src="journeyadmin/images/' . $row['image'] . '" class="d-block w-100" alt="...">';
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
      <?php
      $select_user = mysqli_query($mysqli, "SELECT * FROM `pelanggan` WHERE id_pelanggan = '$id'") or die('query failed');
      if (mysqli_num_rows($select_user) > 0) {
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
      ?>
      <div class="d-flex justify-content-between align-items-center">
         <div class="d-flex justify-content-between align-items-center">
            <img src="image/headerjo.png" width="47px" height="50px" padding="0" alt="">
            <h2 class="text-brand">
               Journey <span>Store</span>
            </h2>
         </div>

         <h3><?php echo $fetch_user['nama_pelanggan']; ?> </h3>
      </div>
      <br>
      <a href="#">
         <button class="btn-floating">
            <i class='bx bx-search-alt-2' style='color:#07a451'></i>
            <span>
               <form action="floating-search.php" method="get" class="search-form">
                  <input type="text" class="form-control" name="keyword">
               </form>
            </span>
         </button>
      </a>
      <br>
      <?php require "promosi.php"; ?>

      <!-- popup -->
      <!-- <div class="popup">
         <div class="popup_content">
            <img class="popup_image" src="popup/20220910_013803.png" width="300px" alt="Popup">
            <img class="popup_close" src="popup/icon-close.png" alt="Close">
         </div>
      </div> -->
      <!-- card product -->
      <div class="wrap-swift d-flex mt-5">
         <?php
         $select_product = mysqli_query($mysqli, "SELECT * FROM `produk`") or die('query failed');
         if (mysqli_num_rows($select_product) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_product)) {
         ?>
               <div class="card">
                  <i>
                     <a href="detail-produk.php?id=<?php echo $fetch_product["id_produk"]; ?>"><img src="journeyadmin/uploads/<?php echo $fetch_product['foto_produk']; ?>" width="auto" class="card-img-top" alt=""></a>
                     <div class="card-body">
                        <h5 class="card-title"><?php echo $fetch_product['nama_produk']; ?></h5>
                        <p class="card-text">Rp.<?php echo $fetch_product['harga_produk']; ?></p>
                        Tersedia <?php echo $fetch_product['ketersediaan_stok']; ?>
                     </div>
                     <div class="wrap-shop d-flex align-items-center">
                        <a href="beli.php?id=<?php echo $fetch_product['id_produk']; ?>"><img src="assets/icon-shop2.png"></a>
                     </div>
                  </i>
               </div>
         <?php
            };
         };
         ?>
      </div>
      <br>
      <br>
      <br>
      <br>
      <section>
         <?php require "navbarbotom.php"; ?>
      </section>

   </div>







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