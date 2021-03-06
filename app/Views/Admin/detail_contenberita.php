<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h1><?= $judul; ?></h1>

    </center>

    <table class="table">
        <tr>
            <td scope="col">Judul Berita</td>
            <td>:</td>

            <td><input type="text" class="form-control disable" name="judul" placeholder="<?= $berita['judul'] ?>" readonly>

            </td>
        </tr>
        <tr>
            <td scope="col">Gambar</td>
            <td>:</td>
            <td>
                <div class="col-sm-2">

                    <img src="/berita/<?= $berita['gambar']; ?>" class="img-thumbnail img-preview responsive-img materialboxed">

                </div>
            </td>
        </tr>
        <tr>
            <td scope="col">Isi Berita</td>
            <td>:</td>
            <td>
                <textarea class="form-control" name="isi_berita" id="isi_berita" rows="10"><?= $berita['isi_berita'] ?></textarea>
            </td>
        </tr>
        <tr>
            <td scope="col">Kategori</td>
            <td>:</td>

            <td>
                <div class="input-group mb-3">
                    <?php foreach ($join as $join) : ?> <input type="text" class="form-control disable" name="kategori" placeholder="<?= $join['kategori'] ?>" readonly>
                    <?php endforeach ?>
                </div>
            </td>
        </tr>
        <tbody>
        </tbody>
    </table>

</div>
<?= $this->endSection(); ?>