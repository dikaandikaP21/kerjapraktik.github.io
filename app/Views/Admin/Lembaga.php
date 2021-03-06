<?= $this->extend('Layout/Template-Admin'); ?>

<?= $this->section('content'); ?>
<!--Content-->
<div class="container mt-5 mb-5">
    <h2>Lembaga Desa <strong>Gadingsari</strong></h2>
    <p>Lembaga yang berada di Desa Gadingsari merupakan lembaga naungan dari pemerintah desa</p>
    <div id="accordion">
        <?php foreach ($lembaga as $data) : ?>
            <a href="/Admin/Edit_lembaga/<?= $data['id']; ?>">
                <div class="btn btn-sucess"> edit </div>
            </a>
        <?php endforeach ?>
        <div class="card mt-3">

            <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                    Karang Taruna
                </a>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                <div class="card-body shadow">
                    <?php foreach ($lembaga as $data) : ?>
                        <?= $data['karangtaruna']; ?>
                    <?php endforeach ?>
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
                    <?php foreach ($lembaga as $data) : ?>
                        <?= $data['bumdes']; ?>
                    <?php endforeach ?>
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
                    <?php foreach ($lembaga as $data) : ?>
                        <?= $data['tp_pkk']; ?>
                    <?php endforeach ?>
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
                    <?php foreach ($lembaga as $data) : ?>
                        <?= $data['lpmd']; ?>
                    <?php endforeach ?>
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
                    <?php foreach ($lembaga as $data) : ?>
                        <?= $data['rt_rw']; ?>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Akhir Content-->
<?= $this->endSection(); ?>