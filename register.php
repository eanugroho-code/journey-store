<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
   $email_pelanggan = $_POST['email_pelanggan'];
   $password = $_POST['password'];
   $nama_pelanggan = $_POST['nama_pelanggan'];
   $whatsapp_pelanggan = $_POST['whatsapp_pelanggan'];
   $alamat_pelanggan = $_POST['alamat_pelanggan'];

   if ($email_pelanggan == ""  || $password == "" || $nama_pelanggan == "" || $whatsapp_pelanggan == "" || $alamat_pelanggan == "") {
      echo "All fields should be filled. Either one or many fields are empty.";
      echo "<br/>";
      echo "<a href='register.php'>Go back</a>";
   } else {
      mysqli_query($mysqli, "INSERT INTO pelanggan(email_pelanggan, password, nama_pelanggan, whatsapp_pelanggan, alamat_pelanggan) VALUES( '$email_pelanggan', md5('$password'), '$nama_pelanggan', '$whatsapp_pelanggan', '$alamat_pelanggan')")
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
            <td>Email</td>
            <td><input type="text" name="email_pelanggan"></td>
         </tr>
         <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
         </tr>
         <tr>
            <td width="10%">Full Name</td>
            <td><input type="text" name="nama_pelanggan"></td>
         </tr>
         <tr>
            <td>Whatsapp</td>
            <td><input type="text" name="whatsapp_pelanggan"></td>
         </tr>
         <tr>
            <td>Address</td>
            <td><input type="text" name="alamat_pelanggan"></td>
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