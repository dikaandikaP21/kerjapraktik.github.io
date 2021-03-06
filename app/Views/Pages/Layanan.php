<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<section class="features bg-light">
    <!--Content-->
    <div class="container mt-5 mb-5">
        <h2><strong>Layanan</strong></h2>
        <div id="accordion">
            <div class="card mt-3">
                <div class="card-header">
                    <a class="card-link text-uppercase" data-toggle="collapse" href="#collapseOne">
                        Alur Pelayanan Kartu Identitas Anak
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body text-center shadow">
                        <?php foreach ($layanan as $data) : ?>
                            <img src="/layanan/<?= $data['layanan_kia']; ?>" class="img-fluid responsive-img materialboxed" style="height: 350px;">
                        <?php endforeach ?>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link text-uppercase" data-toggle="collapse" href="#collapseTwo">
                        Alur Pelayanan KTP
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body text-center shadow">
                        <?php foreach ($layanan as $data) : ?>
                            <img src="/layanan/<?= $data['layanan_ktp']; ?>" class="img-fluid responsive-img materialboxed" style="height: 350px;">
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Akhir Content-->
</section>
<?= $this->endSection(); ?>