<?= $this->extend('Layout/Template-Admin'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h5>Berita</h5>
    </center>
    <form action="kategori_berita" method="POST">

        <div class="row">
            <div class="col-6" style="align-self: left;">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword-kategori" placeholder="Masukkan Pencarian">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>

            </div>
        </div>

    </form>
    <?php
    //  $nomer = 1 + (6 * ($currentPage - 1));
    $nomer = 1;
    ?>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>

        </div>
    <?php endif ?> <table class="table">

        <thead>
            <tr>
                <th> <a href="/Admin/Tambah_kategoriberita">+Tambah Kategori</a>
                </th>
                <th></th>
                <th></th>
                <th>
                </th>
            </tr>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($kategori as $data) : ?>

                <tr>
                    <th scope="row"><?= $nomer++; ?></th>
                    <td><?= $data['kategori']; ?></td>
                    <td>
                        <a href="/Admin/edit_kategoriberita/<?= $data['id_categori']; ?>"><button class="button btn-success">EDIT</button></a>
                    </td>

                </tr>
            <?php
            endforeach;
            ?>

        </tbody>
    </table>

</div>
<?= $this->endSection(); ?>