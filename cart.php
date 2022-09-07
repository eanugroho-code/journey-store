<?php

require 'koneksi.php';
session_start();
$id = $_SESSION['id'];

if (!isset($id)) {
    header('location:cart.php');
};


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
    }
};

if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['quantity'];
    $update_id = $_POST['id'];
    mysqli_query($mysqli, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($mysqli, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:index.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($mysqli, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="shopping-cart">

        <h1 class="heading">shopping cart</h1>

        <table>
            <thead>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>quantity</th>
                <th>total price</th>
                <th>action</th>
            </thead>
            <tbody>
                <?php
                $cart_query = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $grand_total = 0;
                if (mysqli_num_rows($cart_query) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                ?>
                        <tr>
                            <td><img src="./journeyadmin/uploads/<?php echo $fetch_cart['foto']; ?>" height="100" alt=""></td>
                            <td><?php echo $fetch_cart['nama']; ?></td>
                            <td>$<?php echo $fetch_cart['harga']; ?>/-</td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $fetch_cart['id']; ?>">
                                    <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                    <input type="submit" name="update_cart" value="update" class="option-btn">
                                </form>
                            </td>
                            <td>$<?php echo $sub_total = ($fetch_cart['harga'] * $fetch_cart['quantity']); ?>/-</td>
                            <td><a href="index.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
                        </tr>
                <?php
                        $grand_total += $sub_total;
                    }
                } else {
                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                }
                ?>
                <tr class="table-bottom">
                    <td colspan="4">grand total :</td>
                    <td>$<?php echo $grand_total; ?>/-</td>
                    <td><a href="index.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">delete all</a></td>
                </tr>
            </tbody>
        </table>

        <div class="cart-btn">
            <a href="#" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
        </div>

    </div>

    </div>

</body>

</html>