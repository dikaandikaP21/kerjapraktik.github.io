<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h1>EDIT Carousel </h1>

    </center>
    <!-- <?= var_dump(session('id'));
            var_dump(session('judul'));   ?> -->
    <form action="/Admin/update_carousel/<?= $carousel['id']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="gambarlama" id="gambarlama" value="<?= $carousel['gambar']; ?>">
        <table class="table">
            <tr>
                <td scope="col">Pilih Gambar</td>
                <td>:</td>
                <td>
                    <div class="col-sm-2">
                        <img src="/carousel/<?= $carousel['gambar']; ?>" class="img-thumbnail img-preview responsive-img materialboxed">
                    </div>
                    <div class=" custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" name="gambar" id="gambar" onchange="previewImg3()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('gambar'); ?>
                        </div>
                        <label class="custom-file-label" for="gambar"><?= $carousel['gambar']; ?></label>
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