<?= $this->extend('Layout/Template-Admin'); ?>

<?= $this->section('content'); ?>

<section class="features bg-light">
        <div class="container">
                <div class="container p-5">

                        <h2>Profil Desa <strong>Gadingsari</strong></h2>
                        <?php foreach ($sejarah as $data) : ?>
                                <a href="/Admin/Edit_sejarahdesa/<?= $data['id']; ?>">
                                        <div class="btn btn-sucess"> edit </div>
                                </a>
                        <?php endforeach ?>
                        <div id="accordion">
                                <div class="card mt-3">
                                        <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                                        Sejarah Desa
                                                </a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                <div class="card-body">
                                                        <?php foreach ($sejarah as $data) : ?>
                                                                <?= $data['text_sejarah']; ?>
                                                </div>
                                        </div>
                                <?php endforeach ?>
                                </div>
                                <div class="card">
                                        <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                                        Visi Misi Desa
                                                </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                        <?php foreach ($sejarah as $data) : ?>
                                                                <?= $data['visi_misi']; ?>
                                                        <?php endforeach ?>
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
                                                        <?php foreach ($sejarah as $data) : ?>
                                                                <?= $data['keterangan_wilayah']; ?>
                                                        <?php endforeach ?>
                                                </div>
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
                                                        <?php foreach ($sejarah as $data) : ?>
                                                                <?= $data['data_penduduk']; ?>
                                                        <?php endforeach ?>
                                                </div>
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
                                                        <?php foreach ($sejarah as $data) : ?>
                                                                <?= $data['program_desa']; ?>
                                                        <?php endforeach ?>
                                                </div>
                                        </div>
                                </div>

                        </div>
                </div>
        </div>
</section>


<?= $this->endSection(); ?>