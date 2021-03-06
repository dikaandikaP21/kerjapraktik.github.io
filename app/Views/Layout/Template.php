<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--Font Awesome-->
    <link rel="stylesheet" href="/css/all.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Montserrat:wght@200;400;600;700&display=swap" rel="stylesheet">

    <!-- Glide js -->
    <script src="/js/glide.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="/css/glide.theme.min.css">
    <link rel="stylesheet" href="/css/glide.core.min.css">

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

    <!-- Materialboxed -->
    <!-- <link type="text/css" rel="stylesheet" href="/css/materialize.min.css" media="screen,projection"> -->
    <!-- memanggil API recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script>


    <title><?php echo $judul; ?></title>
</head>

<header>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-auto mt-2">
                <img class="logo" width="80" src="/images/Bantul.png" />
            </div>
            <div class="row justify-content-md-center">
                <div class="col-auto mt-4">
                    <img class="nama" src="/images/Group 8.png" />
                    <p class="txt">Jl. Sorobayan, Gadingsari,
                        Daerah Istimewa <br> Yogyakarta
                        55763</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col mt-1">
                <!-- <a href="<?= base_url('Auth') ?>" class="admin"><i class="fas fa-user-tie"></i></a> -->
                </i>
            </div>
        </div>
    </div>
</header>

<body>
    <!-- Navbar -->
    <?= $this->include('Layout/Navbar'); ?>
    <!-- Navbar -->


    <!-- Content -->
    <?= $this->renderSection('content'); ?>
    <!-- Content -->


    <!--Footer-->
    <footer class="border-top pt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-auto">
                    <div class="logo">
                        <img src="/images/Bantul.png" width="60px" alt="" />
                    </div>
                </div>
                <div class="col-auto">
                    <div class="nama">
                        <img src="/images/Group 8.png" width="280px" alt="" />
                        <p class="alamat">
                            Jl. Sorobayan, Gadingsari, Daerah Istimewa Yogyakarta 55763
                        </p>
                    </div>
                </div>
                <div class="col-8 align-self-between text-right">
                    <div class="contact">
                        <h1 class="contact">Contact Us</h1>
                        <a href="#">
                            <img src="/images/003-instagram.png" />
                        </a>
                        <a href="#">
                            <img src="/images/001-facebook.png" />
                        </a>
                        <a href="#">
                            <img src="/images/002-twitter.png" alt="" />
                        </a>
                        <a href="#">
                            <img src="/images/004-phone.png" width="30px" height="30px" alt="" />
                        </a>
                        <a href="#">
                            <img src="/images/005-gmail.png" width="30px" height="30px " alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/all.js"></script>
    <script>
        function previewImg2() {
            const bukti = document.querySelector('#bukti');
            const buktiLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            buktiLabel.textContent = bukti.files[0].name;

            const fileBukti = new FileReader();
            fileBukti.readAsDataURL(bukti.files[0]);

            fileBukti.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <script type="text/javascript" src="/js/materialize.min.js"></script>
    <script>
        //class materialboxed
        const materialbox = document.querySelectorAll('.materialboxed');
        M.Materialbox.init(materialbox);

        //class carousel->material
        const slider = document.querySelectorAll('.slider');
        M.Slider.init(slider, {
            indicators: false,
            transition: 500,
            interval: 3000
        });
    </script>
    <script>
        $('.carousel').carousel('next prev', function() {

            interval: 2000
        })
    </script>

    <script>
        new Glide(".berita", {
            type: 'carousel',
            perView: 3,
            focusAt: 'center',
            gap: 10,
            breakpoints: {
                1200: {
                    perView: 1,
                }
            }
        }).mount();
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabelperpus').DataTable({
                responsive: true,
            });
        });
    </script>
</body>

</html>