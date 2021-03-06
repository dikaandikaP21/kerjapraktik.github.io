<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<!--Content-->
<section class="features bg-light">
    <div class="container">
        <div class="container p-5">
            <h2>Profil Desa <strong>Gadingsari</strong></h2>
            <p>Desa Gadingsari Merupakan Desa Yang Terletak di Kecamatan Sanden,Kabupaten Bantul, Daerah Istimewa Yogyakarta</p>
            <div id="accordion">
                <div class="card mt-3">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            Sejarah Desa
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <div class="card-body text-justify">
                                <div class="card-body text-justify">
                                    <?php foreach ($sejarah as $data) : ?>
                                        <?= $data['text_sejarah']; ?>
                                </div>

                            </div> <?php endforeach ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                            Visi Misi Desa
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <div class="card-body text-justify">
                                <?php foreach ($sejarah as $data) : ?>
                                    <?= $data['visi_misi']; ?>
                            </div>

                        </div> <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Keterangan Wilayah
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="card-body text-justify">
                            <?php foreach ($sejarah as $data) : ?>
                                <?= $data['keterangan_wilayah']; ?>
                        </div>

                    </div> <?php endforeach ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                        Data Penduduk
                    </a>
                </div>
                <div id="collapseFour" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="card-body text-justify">
                            <?php foreach ($sejarah as $data) : ?>
                                <?= $data['data_penduduk']; ?>
                        </div>

                    </div> <?php endforeach ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
                        Program Desa
                    </a>
                </div>
                <div id="collapseFive" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="card-body text-justify">
                            <?php foreach ($sejarah as $data) : ?>
                                <?= $data['program_desa']; ?>
                        </div>

                    </div> <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Akhir Content-->

<?= $this->endSection(); ?>