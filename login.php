<?php session_start(); ?>
<html>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="./journeyadmin/stylelogin.css">
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<style>
   .no-decoration {
      text-decoration: none;
   }
</style>

<body>
   <?php
   include("koneksi.php");

   if (isset($_POST['submit'])) {
      $email = mysqli_real_escape_string($mysqli, $_POST['email']);
      $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

      if ($email == "" || $pass == "") {
         echo "Either username or password field is empty.";
         echo "<br/>";
         echo "<a href='login.php'>Go back</a>";
      } else {
         $result = mysqli_query($mysqli, "SELECT * FROM user_info WHERE email='$email' AND password=md5('$pass')")
            or die("Could not execute the select query.");

         $row = mysqli_fetch_assoc($result);

         if (is_array($row) && !empty($row)) {
            $validuser = $row['email'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
         } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
         }

         if (isset($_SESSION['valid'])) {
            header('Location: index.php');
         }
      }
   } else {
   ?>
      <div class="main-login">
         <div class="left-login">
            <h1>Login<br>Member Area</h1>
            <img src="./image/loginmember.svg" alt="freepik_stories-process">
         </div>
         <form name="form1" action="" method="post">
            <div class="right-login">
               <div class="card-login">
                  <h1>LOGIN</h1>
                  <div class="textfield">
                     <label for="email">Email</label>
                     <input type="email" class="form-control" name="email">
                  </div>
                  <div class="textfield">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" name="password">
                  </div>
                  <button class="btn-login" type="submit" name="submit" value="submit">Login</button>
                  <h2>gabung bersama kami <a href="register.php" class="no-decoration text-white">
                        <h1>DISINI</h1>
                     </a>
                  </h2>
               </div>
            </div>
         </form>
      </div>
   <?php
   }
   ?>
   <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>