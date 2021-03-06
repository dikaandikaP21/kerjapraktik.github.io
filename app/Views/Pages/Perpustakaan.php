<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<section class="features bg-light">
    <div class="container my-3">
        <h2><strong>Perpustakaan</strong></h2>

        <?php
        $nomer = 1;
        ?>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>

            </div>
        <?php endif ?>
        <table id="tabelperpus" class="table" style="overflow-x:auto;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Nomer Buku</th>
                    <th scope="col">Sampul</th>
                    <th scope="col">Kategory</th>
                    <th scope="col">status</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($perpus as $data) : ?>
                    <tr>
                        <th scope="row"><?= $nomer++; ?></th>
                        <td><?= $data['judul_buku']; ?></td>
                        <td><?= $data['nomer_buku']; ?></td>
                        <td><img src="/image-perpustakaan/<?= $data['sampul']; ?> " class="responsive-img materialboxed" width="300" style="width: 60px;"></td>
                        <td><?= $data['kategori']; ?></td>
                        <td><?= $data['status']; ?></td>

                    </tr>
                <?php
                endforeach;
                ?>

            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection(); ?>