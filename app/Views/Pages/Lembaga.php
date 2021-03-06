<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<!--Content-->
<section class="features bg-light">
    <div class="container mt-5 mb-5">
        <h2>Lembaga Desa <strong>Gadingsari</strong></h2>
        <p>Lembaga yang berada di Desa Gadingsari merupakan lembaga naungan dari pemerintah desa</p>
        <div id="accordion">
            <div class="card mt-3">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                        Karang Taruna
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body shadow">
                        <p class="text-justify">
                            <?php foreach ($lembaga as $data) : ?>
                                <?= $data['karangtaruna']; ?>
                            <?php endforeach ?>
                        </p>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        BUMDES
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body shadow">
                        <p class="text-justify">
                            <?php foreach ($lembaga as $data) : ?>
                                <?= $data['bumdes']; ?>
                            <?php endforeach ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        TP PKK
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body shadow">
                        <p class="text-justify">
                            <?php foreach ($lembaga as $data) : ?>
                                <?= $data['tp_pkk']; ?>
                            <?php endforeach ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                        LPMD
                    </a>
                </div>
                <div id="collapseFour" class="collapse" data-parent="#accordion">
                    <div class="card-body shadow">
                        <p class="text-justify">
                            <?php foreach ($lembaga as $data) : ?>
                                <?= $data['lpmd']; ?>
                            <?php endforeach ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
                        RT/RW
                    </a>
                </div>
                <div id="collapseFive" class="collapse" data-parent="#accordion">
                    <div class="card-body shadow">
                        <p class="text-justify">
                            <?php foreach ($lembaga as $data) : ?>
                                <?= $data['rt_rw']; ?>
                            <?php endforeach ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Akhir Content-->
</section>
<?= $this->endSection(); ?>