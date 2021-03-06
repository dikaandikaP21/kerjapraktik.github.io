<?= $this->extend('Layout/Template'); ?>


<?= $this->section('content'); ?>

<!--form-->
<section class="features bg-light">
    <div class="container mt-3">
        <h2><strong>Portal Aduan</strong></h2>

        <form action="/Pages/saveaduan" method="POST" enctype="multipart/form-data" class="mb-5">
            <div class="container">
                <div class="jumbotron">
                    <div class="container">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="judul" class="col-sm-5 col-form-label" style="font-weight: bold; font-size: 18px;">Judul Laporan</label>
                                <input type="text" class="form-control <?= ($validation->hasError('judul_laporan')) ? 'is-invalid' : ''; ?>" name="judul_laporan" id="judul_laporan" placeholder="Judul Laporan">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('judul_laporan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="isi" class="col-sm-5 col-form-label" style="font-weight: bold; font-size: 18px;">Isi Laporan</label>
                                <textarea class="form-control <?= ($validation->hasError('isi_laporan')) ? 'is-invalid' : ''; ?>" name="isi_laporan" id="isi_laporan" rows="3" placeholder="Isi Laporan"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('isi_laporan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="date" class="col-sm-10 col-form-label" style="font-weight: bold; font-size: 18px;">Tanggal Kejadian</label>
                                <input type="date" id="tanggal" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" name="tanggal" min="2010-01-01" max="2020-12-31" placeholder="Tanggal Kejadian">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="lokasi" class="col-sm-5 col-form-label" style="font-weight: bold; font-size: 18px;">Lokasi Kejadian</label>
                                <input type="text" class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" name="lokasi" id="lokasi" placeholder="Lokasi Kejadian">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lokasi'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="instansi" class="col-sm-5 col-form-label" style="font-weight: bold; font-size: 18px;">Instansi Terkait</label>
                                <input type="text" class="form-control <?= ($validation->hasError('instansi_terkait')) ? 'is-invalid' : ''; ?>" name="instansi_terkait" id="instansi_terkait" placeholder="Instansi Terkait">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('instansi_terkait'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="instansi" class="col-sm-5 col-form-label" style="font-weight: bold; font-size: 18px;">Bukti</label>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('bukti')) ? 'is-invalid' : ''; ?>" name="bukti" id="bukti" onchange="previewImg2()">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('bukti'); ?>
                                    </div>
                                    <label class="custom-file-label" for="bukti">Pilih Gambar</label>
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bukti'); ?>
                                </div>

                                <div class="g-recaptcha col-sm-2 mt-5" data-sitekey="6LdE9GkaAAAAAMFJ-Kq5fd6-S3PREkSHsGsL6NOU">
                                </div>
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>

                                    </div>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row-justify-content-center">
                            <div class="col-sm-5">
                                <button type="submit" class="btn">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--akhir form-->

<?= $this->endSection(); ?>