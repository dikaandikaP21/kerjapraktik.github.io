<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h1>EDIT DATA </h1>

    </center>
    <!-- <?= var_dump(session('id'));
            //  var_dump(session('judul_buku'));   
            ?> -->
    <form action="/Admin/update_aduan/<?= $aduan['id']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="buktilama" id="buktilama" value="<?= $aduan['bukti']; ?>">
        <table class="table">
            <tr>
                <td scope="col">Judul Laporan</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('judul_laporan')) ? 'is-invalid' : ''; ?>" name="judul_laporan" id="judul_laporan" value="<?= (old('judul_laporan')) ? old('judul_laporan') : $aduan['judul_laporan'] ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul_laporan'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Isi Laporan</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('isi_laporan')) ? 'is-invalid' : ''; ?>" name="isi_laporan" value="<?= (old('isi_laporan')) ? old('isi_laporan') : $aduan['isi_laporan'] ?>" id="isi_laporan">
                    <div class="invalid-feedback">
                        <?= $validation->getError('isi_laporan'); ?>
                    </div>
                </td>

            </tr>
            <tr>
                <td scope="col">Tanggal</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" name="tanggal" value="<?= (old('tanggal')) ? old('tanggal') : $aduan['tanggal'] ?>" id="tanggal">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tanggal'); ?>
                    </div>
                </td>

            </tr>
            <tr>
                <td scope="col">Lokasi</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" name="lokasi" value="<?= (old('lokasi')) ? old('lokasi') : $aduan['lokasi'] ?>" id="lokasi">
                    <div class="invalid-feedback">
                        <?= $validation->getError('lokasi'); ?>
                    </div>
                </td>

            </tr>
            <tr>
                <td scope="col">Instansi Terkait</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('instansi_terkait')) ? 'is-invalid' : ''; ?>" name="instansi_terkait" value="<?= (old('instansi_terkait')) ? old('instansi_terkait') : $aduan['instansi_terkait'] ?>" id="instansi_terkait">
                    <div class="invalid-feedback">
                        <?= $validation->getError('instansi_terkait'); ?>
                    </div>
                </td>

            </tr>
            <tr>
                <td scope="col"> Gambar bukti</td>
                <td>:</td>
                <td>
                    <div class="col-sm-2">
                        <img src="/image-bukti/<?= $aduan['bukti']; ?>" class="img-thumbnail img-preview responsive-img materialboxed">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('bukti')) ? 'is-invalid' : ''; ?>" name="bukti" id="bukti" onchange="previewImg2()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('bukti'); ?>
                        </div>
                        <label class="custom-file-label" for="bukti"><?= $aduan['bukti']; ?></label>
                    </div>
                </td>

            </tr>
            <tr>
                <td scope="col">status</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" name="status" value="<?= (old('status')) ? old('status') : $aduan['status'] ?>" id="status">
                    <div class="invalid-feedback">
                        <?= $validation->getError('status'); ?>
                    </div>
                </td>

            </tr>
            <tbody>
                <tr>
                    <td></td>

                </tr>
                <tr>
                    <td><input type="submit" value="Simpan" class="btn btn-succes"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<?= $this->endSection(); ?>