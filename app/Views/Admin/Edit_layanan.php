<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h1>EDIT Layanan </h1>

    </center>
    <!-- <?= var_dump(session('id'));
            var_dump(session('judul'));   ?> -->
    <form action="/Admin/update_layanan/<?= $layanan['id']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="gambarlama_kia" id="gambarlama_kia" value="<?= $layanan['layanan_kia']; ?>">
        <input type="hidden" name="gambarlama_ktp" id="gambarlama_ktp" value="<?= $layanan['layanan_ktp']; ?>">
        <table class="table">
            <tr>
                <td scope="col">Pilih Gambar KIA</td>
                <td>:</td>
                <td>
                    <div class="col-sm-2">
                        <img src="/layanan/<?= $layanan['layanan_kia']; ?>" class="img-thumbnail img-preview4 responsive-img materialboxed" onclick="removeSticky()">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('layanan_kia')) ? 'is-invalid' : ''; ?>" name="layanan_kia" id="layanan_kia" onchange="previewImg4()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('layanan_kia'); ?>
                        </div>
                        <label class="custom-file-label" for="layanan_kia"><?= $layanan['layanan_kia']; ?></label>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Pilih Gambar KTP</td>
                <td>:</td>
                <td>
                    <div class="col-sm-2">
                        <img src="/layanan/<?= $layanan['layanan_ktp']; ?>" class="img-thumbnail img-preview5 responsive-img materialboxed">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('layanan_ktp')) ? 'is-invalid' : ''; ?>" name="layanan_ktp" id="layanan_ktp" onchange="previewImg5()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('layanan_ktp'); ?>
                        </div>
                        <label class="custom-file-label" for="layanan_ktp"><?= $layanan['layanan_ktp']; ?></label>
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