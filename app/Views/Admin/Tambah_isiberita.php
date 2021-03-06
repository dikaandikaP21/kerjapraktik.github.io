<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h1>TAMBAH DATA </h1>

    </center>
    <form action="/Admin/save_isiberita" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <table class="table">
            <tr>
                <td scope="col">Judul berita</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('judulberita')) ? 'is-invalid' : ''; ?>" name="judulberita" id="judulberita" value="<?= old('judulberita'); ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('judulberita'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Isi Berita</td>
                <td>:</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control <?= ($validation->hasError('isiberita')) ? 'is-invalid' : ''; ?>" name="isiberita" id="isiberita" rows="10"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('isiberita'); ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Pilih Gambar berita</td>
                <td>:</td>
                <td>
                    <div class="col-sm-2">
                        <img src="/berita/default.jpg" class="img-thumbnail img-preview_berita responsive-img materialboxed">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('file_isiberita')) ? 'is-invalid' : ''; ?>" name="file_isiberita" id="file_isiberita" onchange="previewImg_berita()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('file_isiberita'); ?>
                        </div>
                        <label class="custom-file-label" for="file_isiberita">Pilih Gambar</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Kategori</td>
                <td>:</td>

                <td>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="categoriberita">
                            <option selected>Choose...</option>
                            <?php foreach ($categori as $data) : ?>
                                <option value="<?= $data['id_categori']; ?>"><?= $data['kategori']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('categoriberita'); ?>
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