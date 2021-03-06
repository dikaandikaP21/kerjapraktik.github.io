<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h1><?= $judul; ?></h1>

    </center>
    <form action="/Admin/save_kategoriberita" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <table class="table">
            <tr>
                <td scope="col">Kategori berita</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('kategoriberita')) ? 'is-invalid' : ''; ?>" name="kategoriberita" id="kategoriberita" value="<?= old('kategoriberita'); ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('kategoriberita'); ?>
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