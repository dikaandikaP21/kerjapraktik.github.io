<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h1>TAMBAH DATA </h1>

    </center>
    <form action="/Admin/save_contenberita" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <table class="table">
            <tr>
            <tr>
                <td scope="col">Kategori</td>
                <td>:</td>

                <td>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select class="custom-select" name="categori_berita" id="categori_berita">
                            <option selected>Choose...</option>
                            <?php foreach ($categori as $data) : ?>
                                <option value="<?= $data['id_categori']; ?>"><?= $data['kategori']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('categori_berita'); ?>
                    </div>
                </td>

            </tr>

            <tr>
                <td scope="col">Berita</td>
                <td>:</td>

                <td>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select class="custom-select" name="conten_isiberita" id="conten_isiberita">
                            <option selected>Choose...</option>

                            <option value=""></option>

                        </select>
                    </div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('conten_isiberita'); ?>
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