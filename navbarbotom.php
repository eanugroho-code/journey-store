<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar botom</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="navbarbotom.css?v=<?php echo time(); ?>">
</head>

<body>

    <div class="container">
        <ul class="nav">
            <span class="nav-indicator"> </span>
            <li>
                <a href="help.php">
                    <i class="bx bx-help-circle"></i>
                    <span class="title">Help</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-gift'></i>
                    <span class="title">Gift</span>
                </a>
            </li>
            <li>
                <a href="index.php" class="nav-item-active">
                    <i class="bx bx-home"></i>
                    <span class="title">Produk</span>
                </a>
            </li>
            <li>
                <a href="cart.php">
                    <i class="bx bx-cart"></i>
                    <span class="title">Cart</span>
                </a>
            </li>
            <li>
                <a href="account.php">
                    <i class="bx bx-user"></i>
                    <span class="title">Akun</span>
                </a>
            </li>
        </ul>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="filter-svg">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </defs>
    </svg>
    <script src="navbarbotom.js?v=<?php echo time(); ?>"></script>
</body>

</html>