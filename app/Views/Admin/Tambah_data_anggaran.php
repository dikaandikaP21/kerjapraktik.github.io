<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h1>Tambah File </h1>

    </center>

    <form action="/Admin/save_anggaran" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <table class="table">
            <tr>
                <td>Nama File</td>
                <td>:</td>
                <td>
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td>
                    <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi">
                    <div class="invalid-feedback">
                        <?= $validation->getError('deskripsi'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Pilih Fole Anggaran</td>
                <td>:</td>
                <td>
                    <div class="custom-file">
                        <input type="file" class="form-control <?= ($validation->hasError('file_anggaran')) ? 'is-invalid' : ''; ?>" name="file_anggaran" id="file_anggaran">
                        <div class="invalid-feedback">
                            <?= $validation->getError('file_anggaran'); ?>
                        </div>
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