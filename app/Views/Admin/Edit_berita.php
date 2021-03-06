<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h1>EDIT DATA </h1>

    </center>
    <!-- <?= var_dump(session('id'));
            var_dump(session('judul'));   ?> -->
    <form action="/Admin/update_berita/<?= $berita['id']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="gambarlama" id="gambarlama" value="<?= $berita['gambar']; ?>">
        <table class="table">
            <tr>
                <td scope="col">Judul Berita</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" name="judul" id="judul" value="<?= (old('judul')) ? old('judul') : $berita['judul'] ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Pilih Gambar</td>
                <td>:</td>
                <td>
                    <div class="col-sm-2">
                        <img src="/berita/<?= $berita['gambar']; ?>" class="img-thumbnail img-preview responsive-img materialboxed">
                    </div>
                    <div class=" custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" name="gambar" id="gambar" onchange="previewImg3()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('gambar'); ?>
                        </div>
                        <label class="custom-file-label" for="gambar"><?= $berita['gambar']; ?></label>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Isi Berita</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('isi_berita')) ? 'is-invalid' : ''; ?>" name="isi_berita" value="<?= (old('isi_berita')) ? old('isi_berita') : $berita['isi_berita'] ?>" id="isi_berita">
                    <div class="invalid-feedback">
                        <?= $validation->getError('isi_berita'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">link</td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('link')) ? 'is-invalid' : ''; ?>" name="link" value="<?= (old('link')) ? old('link') : $berita['link'] ?>" id="link">
                    <div class="invalid-feedback">
                        <?= $validation->getError('link'); ?>
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