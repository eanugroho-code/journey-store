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
<style>
    .no-decoration {
        text-decoration: none;
    }

    form div {
        width: 200px;
    }

    .container {
        width: 100%;
        max-width: 1000px;
        margin: 2rem auto;
    }

    .content {
        background-color: white;
        color: black;
        margin: 0.8rem 0;
        border-radius: 0.5rem;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 9, 0.25);
    }

    .header {
        padding: 0.5rem 3rem 0.5rem 1rem;
        min-height: 3.5rem;
        line-height: 1.25rem;
        font-weight: bold;
        display: flex;
        align-items: center;
        position: relative;
        cursor: pointer;
    }

    .header::after {
        content: "\002b";
        font-size: 2rem;
        position: absolute;
        right: 1rem;
    }

    .header.active::before {
        content: "\2212";
    }

    .body {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    .body-content {
        padding: 1rem;
        line-height: 2rem;
        border-top: 1px solid #fff;
    }
    footer {
        text-align: center;
        padding: 3px;
        color: white;
    }

    footer .header::after {
        display: none;
        position: center;
    }
</style>

<body>
    <div class="main m-auto">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <a href="index.php"><img src="image/headerjo.png" width="47px" height="50px" padding="0" alt=""></a>

            </div>
            <h2 class="text-brand">
                Journey <span>Store</span>
            </h2>
        </div>
        <h2>FAQ</h2>

        <div class="container mt-5">

            <div class="content">
                <div class="header">
                    Bagaimana cara mengecek riwayat pesanan saya?
                </div>
                <div class="body">
                    <div class="body-content">
                        Anda dapat melihat riwayat pesanan Anda dengan browsing pada link: <a href="riwayat.php"></a>.
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="header">
                    Bagaimana cara mengecek riwayat pesanan saya?
                </div>
                <div class="body">
                    <div class="body-content">
                        Anda dapat melihat riwayat pesanan Anda dengan browsing pada link: <a href="riwayat.php"></a>.
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="header">
                    Bagaimana cara mengecek riwayat pesanan saya?
                </div>
                <div class="body">
                    <div class="body-content">
                        Anda dapat melihat riwayat pesanan Anda dengan browsing pada link: <a href="riwayat.php"></a>.
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="header">
                    Bagaimana cara mengecek riwayat pesanan saya?
                </div>
                <div class="body">
                    <div class="body-content">
                        Anda dapat melihat riwayat pesanan Anda dengan browsing pada link: <a href="riwayat.php"></a>.
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <footer>

            <p>Author: Journey Official<br>

                <a href="mailto:journeyofficial96@gmail.com">journeyofficial96@gmail.com</a>
            </p>
            <p>Pengembang aplikasi <br>
                <a href="https://journeyean.github.io/resume-eanugroho/">
                    <i class='bx bx-send bx-fade-right'> Journey. ea</i>
                </a>
            </p>
        </footer>
        <section>
         <?php require "navbarbotom.php"; ?>
      </section>
    </div>




    <script>
        const ItemHeaders = document.querySelectorAll(".header");

        ItemHeaders.ForEach(ItemHeader => {
            ItemHeader.addEventListener("click", event => {
                ItemHeader.classList.toggle("active");

                const ItemBody = ItemHeader.
                nextElementSibling;

                if (ItemHeader.classList.contains("active")) {
                    ItemBody.style.maxHeight = ItemBody.
                    scrollHeight + "px"
                } else {
                    ItemBody.style.maxHeight = 0;
                }
            })
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

</body>

</html>