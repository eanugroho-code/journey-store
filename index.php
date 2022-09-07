<?php

require 'koneksi.php';
session_start();
$id = $_SESSION['id'];

if (!isset($id)) {
   header('location:cart.php');
};

if (isset($_GET['logout'])) {
   unset($user_id);
   session_destroy();
   header('location:login.php');
};



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
      }
   }
   ?>

   <div class="container">

      <div class="user-profile">

         <?php
         $select_user = mysqli_query($mysqli, "SELECT * FROM `user_info` WHERE id = '$id'") or die('query failed');
         if (mysqli_num_rows($select_user) > 0) {
            $fetch_user = mysqli_fetch_assoc($select_user);
         };
         ?>

         <p> Hai <span><?php echo $fetch_user['name']; ?></span> </p>
         <p> Almat : <span><?php echo $fetch_user['address']; ?></span> </p>
         <div class="flex">
            <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
         </div>

      </div>

      <div class="products">

         <h1 class="heading">latest products</h1>

         <div class="box-container">

            <?php
            $select_product = mysqli_query($mysqli, "SELECT * FROM `produk`") or die('query failed');
            if (mysqli_num_rows($select_product) > 0) {
               while ($fetch_product = mysqli_fetch_assoc($select_product)) {
            ?>
                  <form method="post" class="box" action="">
                     <img src="./journeyadmin/uploads/<?php echo $fetch_product['foto']; ?>" width="300px" alt="">
                     <div class="name"><?php echo $fetch_product['nama']; ?></div>
                     <div class="price">Rp.<?php echo $fetch_product['harga']; ?>/-</div>
                     <input type="number" min="1" name="product_quantity" value="1">
                     <input type="hidden" name="product_image" value="<?php echo $fetch_product['foto']; ?>">
                     <input type="hidden" name="product_name" value="<?php echo $fetch_product['nama']; ?>">
                     <input type="hidden" name="product_price" value="<?php echo $fetch_product['harga']; ?>">
                     <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                  </form>
            <?php
               };
            };
            ?>

         </div>

      </div>


</body>

</html>