<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $whatsapp = $_POST['whatsapp'];
   $password = $_POST['password'];

   if ($name == "" || $email == "" || $address == "" || $whatsapp == "" || $password == "") {
      echo "All fields should be filled. Either one or many fields are empty.";
      echo "<br/>";
      echo "<a href='register.php'>Go back</a>";
   } else {
      mysqli_query($mysqli, "INSERT INTO user_info(name, email, address, whatsapp, password) VALUES('$name', '$email', '$address', '$whatsapp', md5('$password'))")
         or die("Could not execute the insert query.");

      $message = 'Registrasi berhasil';
      header("location:login.php");
   }
} else {
?>

   <p>
      <font size="+2">Register</font>
   </p>
   <form name="form1" method="post" action="">
      <table width="75%" border="0">
         <tr>
            <td width="10%">Full Name</td>
            <td><input type="text" name="name"></td>
         </tr>
         <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
         </tr>
         <tr>
            <td>Address</td>
            <td><input type="text" name="address"></td>
         </tr>
         <tr>
            <td>Whatsapp</td>
            <td><input type="text" name="whatsapp"></td>
         </tr>
         <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
         </tr>
         <tr>
            <td> </td>
            <td><input type="submit" name="submit" value="Submit"></td>
         </tr>
      </table>
   </form>
<?php
}
?>
</body>

</html>