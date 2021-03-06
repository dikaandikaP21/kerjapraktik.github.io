<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h1>TAMBAH DATA </h1>

    </center>
    <form action="/Admin/saveperpus" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <table class="table">
            <tr>
                <td scope="col">Judul Buku</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('judul_buku')) ? 'is-invalid' : ''; ?>" name="judul_buku" id="judul_buku" value="<?= old('judul_buku'); ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul_buku'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Nomer Buku</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('nomer_buku')) ? 'is-invalid' : ''; ?>" name="nomer_buku" value="<?= old('nomer_buku'); ?>" id="nomer_buku">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nomer_buku'); ?>
                    </div>
                </td>

            </tr>
            <tr>
                <td scope="col">Pilih Gambar Sampul</td>
                <td>:</td>
                <td>
                    <div class="col-sm-2">
                        <img src="/image-perpustakaan/default.jpg" class="img-thumbnail img-preview responsive-img materialboxed">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" name="sampul" id="sampul" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('sampul'); ?>
                        </div>
                        <label class="custom-file-label" for="sampul">Pilih Gambar</label>
                    </div>

                </td>

            </tr>
            <tr>
                <td scope="col">Kategori</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" name="kategori" value="<?= old('kategori'); ?>" id="kategori">
                    <div class="invalid-feedback">
                        <?= $validation->getError('kategori'); ?>
                    </div>
                </td>

            </tr>
            <tr>
                <td scope="col">Status</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" name="status" value="<?= old('status'); ?>" id="status">
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