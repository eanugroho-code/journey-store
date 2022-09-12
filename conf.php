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

.message{
position: sticky;
top:0; left:0; right:0;
padding:15px 10px;
background-color: var(--white);
text-align: center;
z-index: 1000;
box-shadow: var(--box-shadow);
color:var(--black);
font-size: 20px;
text-transform: capitalize;
cursor: pointer;
}

.btn,
.delete-btn,
.option-btn{
display: inline-block;
padding:10px 30px;
cursor: pointer;
font-size: 18px;
color:var(--white);
border-radius: 5px;
text-transform: capitalize;
}

.btn:hover,
.delete-btn:hover,
.option-btn:hover{
background-color: var(--black);
}

.btn{
background-color: var(--blue);
margin-top: 10px;
}

.delete-btn{
background-color: var(--red);
}

.option-btn{
background-color: var(--orange);
}

.form-container{
min-height: 100vh;
display: flex;
align-items: center;
justify-content: center;
padding:20px;
padding-bottom: 70px;
}

.form-container form{
width: 500px;
border-radius: 5px;
border:var(--border);
padding:20px;
text-align: center;
background-color: var(--white);
}

.form-container form h3{
font-size: 30px;
margin-bottom: 10px;
text-transform: uppercase;
color:var(--black);
}

.form-container form .box{
width: 100%;
border-radius: 5px;
border:var(--border);
padding:12px 14px;
font-size: 18px;
margin:10px 0;
}

.form-container form p{
margin-top: 20px;
font-size: 20px;
color:var(--black);
}

.form-container form p a{
color:var(--red);
}

.form-container form p a:hover{
text-decoration: underline;
}

.container{
padding:0 20px;
margin:0 auto;
max-width: 1200px;
padding-bottom: 70px;
}

.container .heading{
text-align: center;
margin-bottom: 20px;
font-size: 40px;
text-transform: uppercase;
color:var(--black);
}

.container .user-profile{
padding:20px;
text-align: center;
border:var(--border);
background-color: var(--white);
box-shadow: var(--box-shadow);
border-radius: 5px;
margin:20px auto;
max-width: 500px;
}

.container .user-profile p{
margin-bottom: 10px;
font-size: 25px;
color:var(--black);
}

.container .user-profile p span{
color:var(--red);
}

.container .user-profile .flex{
display: flex;
justify-content: center;
flex-wrap: wrap;
gap:10px;
align-items: flex-end;
}

.container .products .box-container{
display: flex;
flex-wrap: wrap;
gap:15px;
justify-content: center;
}

.container .products .box-container .box{
text-align: center;
border-radius: 5px;
box-shadow: var(--box-shadow);
border:var(--border);
position: relative;
padding:20px;
background-color: var(--white);
width: 350px;
}

.container .products .box-container .box img{
height: 250px;
}

.container .products .box-container .box .name{
font-size: 20px;
color:var(--black);
padding:5px 0;
}

.container .products .box-container .box .price{
position: absolute;
top:10px; left:10px;
padding:5px 10px;
border-radius: 5px;
background-color: var(--orange);
color:var(--white);
font-size: 25px;
}

.container .products .box-container .box input[type="number"]{
margin:10px 0;
width: 100%;
border:var(--border);
border-radius: 5px;
font-size: 20px;
color:var(--black);
padding:12px 14px
}

.container .shopping-cart{
padding:20px 0;
}

.container .shopping-cart table{
width: 100%;
text-align: center;
border:var(--border);
border-radius: 5px;
box-shadow: var(--box-shadow);
background-color: var(--white);
}

.container .shopping-cart table thead{
background-color: var(--black);
}

.container .shopping-cart table thead th{
padding:10px;
color:var(--white);
text-transform: capitalize;
font-size: 20px;
}

.container .shopping-cart table .table-bottom{
background-color: var(--light-bg);
}

.container .shopping-cart table tr td{
padding:10px;
font-size: 20px;
color:var(--black);
}

.container .shopping-cart table tr td:nth-child(1){
padding:0;
}

.container .shopping-cart table tr td input[type="number"]{
width: 80px;
border:var(--border);
padding:12px 14px;
font-size: 20px;
color:var(--black);
}

.container .shopping-cart .cart-btn{
margin-top: 10px;
text-align: center;
}

.container .shopping-cart .disabled{
pointer-events: none;
background-color: var(--red);
opacity: .5;
user-select: none;
}


@media (max-width:1200px){
.container .shopping-cart{
overflow-x: scroll;
}

.container .shopping-cart table{
width: 1200px;
}
}

@media (max-width:450px){
.container .heading{
font-size: 30px;
}
.container .products .box-container .box img{
height: 200px;
}
}

<!-- <div class="container">

         <div class="user-profile">

            

            
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

         </div>-->

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