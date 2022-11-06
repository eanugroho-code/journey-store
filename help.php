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
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');



    .no-decoration {
        text-decoration: none;
    }

    .box {
        margin: 50px auto;
        background: #9872;
        border-radius: 4px;
        box-shadow: 1px 2px 4px rgba(0, 0, 0, .3);
    }

    .box .heading {
        background: #7800cf;
        border-radius: 7px 7px 0px 0px;
        padding: 10px;
        color: #fff;
        text-align: center;

    }

    .faqs {
        padding: 0px 17px 17px;
    }

    ::-webkit-details-marker {
        float: right;
        margin-top: 3px;
    }

    details {
        background: #9872;
        padding: 8px;
        border-radius: 8px;
        margin-top: 15px;
        font-family: "Rubik";
        font-size: 15px;
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

        <div class="box">
            <p class="heading">FAQs</p>
            <div class="faqs">
                <details>
                    <summary> Bagaimana cara berbelanja di Journey Store?</summary>
                    <p class="text">kamu dapat mengklik tombol keranjang berwarna hijau dan kamu akan dialihkan ke halaman keranjang setelah itu kamu dapat checkout untuk melanjutkan transaksi,
                        pemesanan sebelum pukul 23:59 setiap harinya, agar pesanan dapat dikirimkan keesokan harinya,
                        JourneyStore akan melakukan pengantaran pesanan keesokan harinya mulai jam 07:00, dan paling telat jam 15.00
                        Ambil pesanan Anda dari driver dan bayar setelah pesanan Anda sampai
                    </p>
                </details>
                <details>
                    <summary> Bagaimana cara memesan produk lebih dari 1?</summary>
                    <p class="text">silahkan klik pada gambar produk lalu , isikan jumlah quantity yang kamu inginkan...</p>
                </details>
                <details>
                    <summary> Bagaimana cara mendapatkan akun untuk login ?</summary>
                    <p class="text">silahkan kamu beralih ke halaman account lalu kamu klik login, setelah itu kamu registrasi di bawah tulisan tombol login.</p>
                </details>
                <details>
                    <summary> Bagaimana Cara untuk bertransaksi ?</summary>
                    <p class="text">Journey Store menggunakan sistem Cash On Delivery COD.</p>
                </details>
                <details>
                    <summary> Kapan pengantaran dilakukan oleh JourneyStore?</summary>
                    <p class="text">Pengantaran dilakukan keesokan harinya dan akan sampai di tempat Anda jam 07:00-15:00.</p>
                </details>
                <details>
                    <summary>Bagaimana jika saya ingin mengubah/membatalkan pesanan saya?</summary>
                    <p class="text">Anda tidak bisa mengubah/membatalkan untuk sebagian pesanan saja. Namun, Anda bisa membatalkan seluruh pesanan dengan memberi tahu ke CS kami di nomor 081383796300 dan mengulang pemesanan baru di link yang sama sebelum pukul 23:59 setiap harinya..</p>
                </details>
                <details>
                    <summary> Mengapa pesanan saya baru sampai keesokan harinya?</summary>
                    <p class="text">Pesanan Anda kami penuhi keesokan harinya karena kami ingin memastikan produk yang Anda pesan sudah sesuai.</p>
                </details>
                <details>
                    <summary> Apakah ada biaya pengiriman?</summary>
                    <p class="text">Tidak ada biaya pengiriman atau ongkos kirim yang kami kenakan.</p>
                </details>
                <details>
                    <summary> Syarat & Ketentuan Metode Refund serta Informasi Lainnya </summary>
                    <p class="text">Jika ada pertanyaan, silakan hubungi Whatsapp Customer Service Segari untuk bantuan lebih lanjut.</p>
                    <p class="text">WhatsApp: 081383796300</p>
                </details>
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