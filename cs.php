<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />

    <title>Customer Service</title>
  </head>

<style>
    section {
  padding-top: 4rem;
}

.spinner{
  width: 15px;
  border: 1px solid transparent
}

.wrapper{
  display: inline-flex;
}

.wrapper .icon{
  margin: 0 20px;
  text-align: center;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  position: relative;
  z-index: 2;
  transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .icon span{
  display: block;
  height: 60px;
  width: 60px;
  background: #fff;
  border-radius: 50%;
  position: relative;
  z-index: 2;
  box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.1);
  transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .icon span i{
  line-height: 60px;
  font-size: 25px;
}

.wrapper .icon .tooltip{
  position: absolute;
  top: 0;
  z-index: 1;
  background: #fff;
  color: #fff;
  font-size: 20px;
  font-weight: 500;
  padding: 10px 18px;
  border-radius: 25px;
  opacity: 0;
  pointer-events: none;
  box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.1);
  transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .icon:hover .tooltip{
  top: -70px;
  opacity: 1;
  pointer-events: auto;
}

.icon .tooltip:before{
  position: absolute;
  content: "";
  height: 15px;
  width: 15px;
  background: #fff;
  left: 50%;
  bottom: -6px;
  transform: translateX(-50%) rotate(45deg);
  transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .icon:hover span{
  color: #fff;
}

.wrapper .icon:hover span,
.wrapper .icon:hover .tooltip{
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
}

.wrapper .facebook:hover span,
.wrapper .facebook:hover .tooltip,
.wrapper .facebook:hover .tooltip:before{
  background: #2980b9;
}

.wrapper .instagram:hover .tooltip,
.wrapper .instagram:hover span,
.wrapper .instagram:hover .tooltip:before{
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
  -webkit-text-fill-color: transparent;
}

.wrapper .youtube:hover span,
.wrapper .youtube:hover .tooltip,
.wrapper .youtube:hover .tooltip:before{
  background: rgb(255, 0, 0);
}

.wrapper .whatsapp:hover span,
.wrapper .whatsapp:hover .tooltip,
.wrapper .whatsapp:hover .tooltip:before{
  background: #27ae60;
}

/* popup */
.popup{
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,.3);
  position: fixed;
  opacity: 0;
  transition: all .2s ease-in;
}
.popup_content{
  width: 300px;
  text-align: center;
  position: relative;
  margin:20vh auto;
}

.popup_image{
  width: 100%;
  margin-bottom: 15px;
}

.popup_close{
  position: absolute;
  top: 0;
  right: 0;
  width:20px;
}
.popup--show{
  opacity: 1;
}
.popup--close{
  display: none;
  transition: all .2s ease-out;
  color: #000000;

}
</style>

<body>
    <section id="Contact">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Customer Service</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
                        <strong>Hello!</strong> Thanks, pesan kamu sudah kami terima.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <form name="wpu-contact-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">WhatsApp</label>
                            <input type="number" class="form-control" id="whatsapp" aria-describedby="whatsapp" name="whatsapp">
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="6" name="pesan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info btn-kirim">Kirim</button>
                        <div class="btn-loading d-none">
                            <div class="spinner-grow text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-success" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-danger" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-warning" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-info" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0dcaf0" fill-opacity="1" d="M0,160L34.3,170.7C68.6,181,137,203,206,197.3C274.3,192,343,160,411,165.3C480,171,549,213,617,224C685.7,235,754,213,823,176C891.4,139,960,85,1029,85.3C1097.1,85,1166,139,1234,144C1302.9,149,1371,107,1406,85.3L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
        </svg>
    </section>
    <!-- Akhir Contact -->

    <!-- Footer -->
    <footer class="bg-info text-white text-center pb-5">
        <p>Created with <i class="bi bi-suit-heart-fill text-danger"></i> by <a href="https://www.instagram.com/journey_ea/" class="text-white fw-bold">EA_Nugroho</a></p>
    </footer>
    <!-- Akhir Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbySRoOoNIxtIoE_KHqf4wDXXhN0Io0PpbSwCjXFzWK4zgZ2DyOVwOBdfCzEitVlolKwAA/exec';
        const form = document.forms['wpu-contact-form'];
        const btnKirim = document.querySelector('.btn-kirim');
        const btnLoading = document.querySelector('.btn-loading');
        const myAlert = document.querySelector('.my-alert');

        form.addEventListener('submit', e => {
            e.preventDefault();
            // cubmit
            // tampil tombol loading
            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');
            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => {
                    btnLoading.classList.toggle('d-none');
                    btnKirim.classList.toggle('d-none');
                    myAlert.classList.toggle('d-none');
                    // reset
                    form.reset();
                    console.log('Success!', response)
                })
                .catch(error => console.error('Error!', error.message))
        })
    </script>
</body>

</html>

</body>


</html>