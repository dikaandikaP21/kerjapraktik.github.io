<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Materialboxed -->
    <!-- <link rel="stylesheet" href="/css/materialize.min.css"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css" />
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="/css/all.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Montserrat:wght@200;400;600;700&display=swap" rel="stylesheet" />

    <!-- Memanggil Ajax -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- Glide js -->
    <script src="/js/glide.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="/css/glide.theme.min.css">
    <link rel="stylesheet" href="/css/glide.core.min.css">

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">


    <!--Memanggil API WYSIWYG -->
    <script src="<?= base_url('ckeditor/ckeditor.js'); ?>"></script>
    <script src="/ckeditor5-build-classic/ckeditor.js.map"></script>
    <title>
        <?php echo $judul; ?>
    </title>

</head>

<!--Header-->
<header>
    <div class="container">
        <div class="row justify-content-center">
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
        </div>
    </div>
</header>
<!--Akhir Header-->

<body>
    <!-- Navbar -->
    <?= $this->include('Layout/Navbar-admin'); ?>
    <!-- Navbar -->

    <!-- Content -->
    <?= $this->renderSection('content'); ?>
    <!-- Akhir Content -->

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
                        <img src="/images/Group 8.png" width="280px" class="ml-4" />
                        <p class="alamat">
                            Jl. Sorobayan, Gadingsari, Daerah Istimewa <br>Yogyakarta 55763
                        </p>
                    </div>
                </div>

                <div class="col-8 align-self-between text-right">
                    <div class="contact">
                        <h1>Contact Us</h1>
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

    <!--Akhir Footer-->
    <!-- AJAX -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('#categori_berita').change(function() {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Admin/getautoselect'); ?>",
                    data: {
                        id: id
                    },

                    dataType: "JSON",
                    success: function(response) {
                        $('#conten_isiberita').html(response);
                    }
                })
            })

        })
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/all.js"></script>
    <script>
        function previewImg() {
            const sampul = document.querySelector('#sampul');
            const sampulLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <script>
        function previewImg_berita() {
            const file_isiberita = document.querySelector('#file_isiberita');
            const file_isiberitaLabel = document.querySelector('.custom-file-label');
            const imgPreview_berita = document.querySelector('.img-preview_berita');

            file_isiberitaLabel.textContent = file_isiberita.files[0].name;

            const filenya_isiberita = new FileReader();
            filenya_isiberita.readAsDataURL(file_isiberita.files[0]);

            filenya_isiberita.onload = function(e) {
                imgPreview_berita.src = e.target.result;
            }
        }
    </script>
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
    <script>
        function previewImg3() {
            const bukti = document.querySelector('#gambar');
            const buktiLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            buktiLabel.textContent = gambar.files[0].name;

            const fileBukti = new FileReader();
            fileBukti.readAsDataURL(gambar.files[0]);

            fileBukti.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <script>
        function previewImg4() {
            const layanan_kia = document.querySelector('#layanan_kia');
            const buktilabel1 = document.querySelector('.custom-file-label');
            const imgPreview4 = document.querySelector('.img-preview4');

            buktilabel1.textContent = layanan_kia.files[0].name;

            const fileBukti1 = new FileReader();
            fileBukti1.readAsDataURL(layanan_kia.files[0]);

            fileBukti1.onload = function(e) {
                imgPreview4.src = e.target.result;
            }
        }
    </script>
    <script>
        function previewImg5() {
            const layanan_ktp = document.querySelector('#layanan_ktp');
            const buktilabel2 = document.querySelector('.custom-file-label');
            const imgPreview5 = document.querySelector('.img-preview5');

            buktilabel2.textContent = layanan_ktp.files[0].name;

            const fileBukti2 = new FileReader();
            fileBukti2.readAsDataURL(layanan_ktp.files[0]);

            fileBukti2.onload = function(e) {
                imgPreview5.src = e.target.result;
            }
        }
    </script>
    <script>
        function previewImg6() {
            const file_anggaran = document.querySelector('#file_anggaran');
            const buktilabel2 = document.querySelector('.custom-file-label');
            const imgPreview5 = document.querySelector('.img-preview6');

            buktilabel2.textContent = file_anggaran.files[0].name;

            const fileBukti2 = new FileReader();
            fileBukti2.readAsDataURL(file_anggaran.files[0]);

            fileBukti2.onload = function(e) {
                imgPreview5.src = e.target.result;
            }
        }
    </script>
    <script>
        function removeSticky() {
            var navbarclass = document.getElementById("nav-admin");
            navbarclass.classList.remove("sticky-top");
        }
    </script>
    <script type="text/javascript" src="/js/materialize.min.js"></script>
    <script>
        const materialbox = document.querySelectorAll('.materialboxed');
        M.Materialbox.init(materialbox);
    </script>
    <script>
        $('.carousel').carousel('next prev', function() {

            interval: 2000
        })
    </script>
    <script>
        //untuk lembaga
        CKEDITOR.replace('karangtaruna');
        CKEDITOR.replace('bumdes');
        CKEDITOR.replace('tp_pkk');
        CKEDITOR.replace('lpmd');
        CKEDITOR.replace('rt_rw');
        //untuk sejarah desa
        CKEDITOR.replace('text_sejarah');
        CKEDITOR.replace('visi_misi');
        CKEDITOR.replace('keterangan_wilayah');
        CKEDITOR.replace('data_penduduk');
        CKEDITOR.replace('program_desa');
        //coba berita
        CKEDITOR.replace('isi_berita');
        CKEDITOR.replace('isiberita');
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
    <!-- datatables -->
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