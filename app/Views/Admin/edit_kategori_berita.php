<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h1>EDIT DATA </h1>

    </center>
    <!-- <?= var_dump(session('id'));
            var_dump(session('judul'));   ?> -->
    <form action="/Admin/update_kategori_berita/<?= $kategori['id_categori']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <table class="table">
            <tr>
                <td scope="col">Kategori Berita </td>
                <td>:</td>
                <td><input type="text" class="form-control <?= ($validation->hasError('kategori_berita')) ? 'is-invalid' : ''; ?>" name="kategori_berita" id="kategori_berita" value="<?= (old('kategori_berita')) ? old('kategori_berita') : $kategori['kategori'] ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('kategori_berita'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan" class="btn btn-succes"></td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<?= $this->endSection(); ?>