<?= $this->extend('Layout/Template-Admin'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <center>
        <h5>Aduan</h5>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-6" style="align-self: left;">
                <form action="Aduan" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword-aduan" placeholder="Masukkan Pencarian">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    $nomer = 1 + (6 * ($currentPage - 1));
    ?>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>

        </div>
    <?php endif ?> <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Laporan</th>
                <th scope="col">Isi Laporan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Lokasi</th>
                <th scope="col">instansi_terkait</th>
                <th scope="col">bukti</th>
                <th scope="col">status</th>
                <th scope="col">Hapus/Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aduan as $data) : ?>
                <tr>
                    <th scope="row"><?= $nomer++; ?></th>
                    <td><?= $data['judul_laporan']; ?></td>
                    <td><?= $data['isi_laporan']; ?></td>
                    <td><?= $data['tanggal']; ?></td>
                    <td><?= $data['lokasi']; ?></td>
                    <td><?= $data['instansi_terkait']; ?></td>
                    <td><img src="/image-bukti/<?= $data['bukti']; ?>" class="responsive-img materialboxed" style="width: 60px;"></td>
                    <td><?= $data['status']; ?></td>
                    <td>
                        <form action="/admin/aduan/<?= $data['id']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete </button>
                        </form>
                        <a href="/Admin/edit_data_aduan/<?= $data['id']; ?>" class='btn btn-success'>Edit</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
    <?= $pager->links('aduan', 'Aduan_pagination'); ?>
</div>
<?= $this->endSection(); ?>