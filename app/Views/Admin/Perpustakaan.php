<?= $this->extend('Layout/Template-Admin'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h5><a href="/Admin/perpustakaan">Perpustakaan</a></h5>
    </center>
    <!-- <form action="perpustakaan" method="POST">

        <div class="row">
            <div class="col-6" style="align-self: left;">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword-perpustakaan" placeholder="Masukkan Pencarian">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>

            </div>
        </div>

    </form> -->
    <?php
    // $nomer = 1 + (6 * ($currentPage - 1));
    $nomer = 1;
    ?>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>

        </div>
    <?php endif ?> <table class="table" id="tabelperpus">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <!-- <th scope="col"><a href="descending">Judul Buku</a></th> -->
                <th scope="col">Judul Buku</th>
                <th scope="col">Nomer Buku</th>
                <th scope="col">Sampul</th>
                <th scope="col">Kategory</th>
                <th scope="col">status</th>
                <th scope="col">hapus/edit </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($perpus as $data) : ?>
                <tr>
                    <th scope="row"><?= $nomer++; ?></th>
                    <td><?= $data['judul_buku']; ?></td>
                    <td><?= $data['nomer_buku']; ?></td>
                    <td><img src="/image-perpustakaan/<?= $data['sampul']; ?>" class="responsive-img materialboxed" style="width: 60px;"></td>
                    <td><?= $data['kategori']; ?></td>
                    <td><?= $data['status']; ?></td>
                    <td>
                        <form action="/Admin/delete/<?= $data['id']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete </button>
                        </form>
                        <a href="/Admin/edit_data/<?= $data['id']; ?>" class='btn btn-success'>Edit</a>
                    </td>

                </tr>
            <?php
            endforeach;
            ?>

            <a href="/admin/tambah_data">+Tambah Data</a>
        </tbody>
    </table>

</div>
<?= $this->endSection(); ?>