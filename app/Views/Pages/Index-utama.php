<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>

<!---Carousel-->
<div class="carousel">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $i = 0;
            foreach ($carousel as $data) :
                $actives = '';
                if ($i == 0) {
                    $actives = 'active';
                }
            ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>
            <?php $i++;
            endforeach ?>
        </ol>


        <div class="carousel-inner">
            <?php
            $i = 0;
            foreach ($carousel as $data) :
                $actives = '';
                if ($i == 0) {
                    $actives = 'active';
                }
            ?> <div class="carousel-item text-center <?= $actives; ?>">
                    <img src="/carousel/<?= $data['gambar'] ?>" class="d-block w-100 carousel-pic" style="object-fit: cover">
                </div>
            <?php $i++;
            endforeach ?>



        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!--akhir carousel1-->

<!--Features-->
<section class="Features bg-light p-5">
    <div class="features">
        <!-- Berita -->
        <div class="news-wrap">
            <div class="container">

                <h3>Berita Terbaru</h3>
                <hr>
                <div class="berita glide">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <?php foreach ($berita as $data) : ?>
                                <li class="glide__slide">
                                    <div class="news-grid">
                                        <div class="news-grid-image">
                                            <img src="/berita/<?= $data['gambar']; ?>">
                                            <div class="news-grid-box">

                                                <p><?= $data['updated_at']; ?></p>
                                            </div>
                                        </div>
                                        <div class="news-grid-txt">
                                            <span><?= $data['kategori']; ?></span>
                                            <h2><?= $data['judul']; ?></h2>
                                            <p><?= $data['isi_berita']; ?></p>
                                            <a href="/Pages/Berita/<?= $data['id_berita']; ?>">Read More....</a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>

                        </ul>
                    </div>
                    <div class="glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa fa-arrow-left" aria-hidden="true"></i></i></button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa fa-arrow-right" aria-hidden="true"></i></i></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- akhir berita -->
    <div class="container">
        <div class="row-justify-content-start">
            <div class="profil pt-5">
                <h3>Media Desa</h3>
                <hr>
            </div>

            <iframe width="660" height="500" class="youtube" src="https://www.youtube.com/embed/9IMkTnduEMQ?autoplay=0">
            </iframe>

            <div class="fb-like-box" data-href="https://www.facebook.com/PemkabBantul" data-width="350" data-height="500" data-show-faces="true" data-header="false" data-stream="true" data-show-border="false">
            </div>

            <div id="fb-root"></div>
            <script>
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
        </div>
    </div>


    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="instansi">
                    <h3>Instansi Terkait</h3>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2 mt-3">
                <a href="https://bpbd.bantulkab.go.id"> <img src="images/Bpbd.png" class="img-thumbnail h-100 w-100" style="max-height: 160px; object-fit: contain"></a>
            </div>
            <div class="col-2 mt-3">
                <a href="https://gadingsari.bantulkab.go.id/first"> <img src=" images/Bantul.png" class="img-thumbnail h-100 w-100" style="max-height: 160px; object-fit: contain"> </a>
            </div>
            <div class="col-2 mt-3">
                <a href="https://web.facebook.com/pages/category/Government-Organization/Humas-Polsek-Sanden-1666229093691158/?_rdc=1&_rdr"> <img src="images/polsek.jpg" class="img-thumbnail h-100 w-100" style="max-height: 160px; object-fit: contain"></a>
            </div>
            <div class="col-2 mt-3">
                <a href="http://kua-sanden.blogspot.com"> <img src="images/kua.png" class="img-thumbnail h-100 w-100" style="max-height: 160px; object-fit: contain"></a>
            </div>
            <div class="col-2 mt-3">
                <img src="images/Bantul.png" class="img-thumbnail h-100 w-100" style="max-height: 160px; object-fit: contain">
            </div>
            <div class="col-2 mt-3">
                <img src="images/Bantul.png" class="img-thumbnail h-100 w-100" style="max-height: 160px; object-fit: contain">
            </div>
        </div>
    </div>
    </div>

</section>
<!--Akhir Features-->


<?= $this->endSection(); ?>