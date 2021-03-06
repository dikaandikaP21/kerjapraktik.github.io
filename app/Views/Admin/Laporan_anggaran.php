<?= $this->extend('Layout/Template-Admin'); ?>

<?= $this->section('content'); ?>
<section class="features bg-light">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif ?>
    <div class="container">
        <table class="table">
            <div class="row">
                <a href="/Admin/Tambah_data_anggaran"><button class="btn btn-primary mb-4 mt-4">Tambah File</button> </a>
                <table class="table">
                    <thead class="table-primary"">
                    <tr>
                        <th scope=" col">No</th>
                        <th scope="col">Nama File</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Tanggal Upluod</th>
                        <th scope="col">File</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <?php foreach ($laporan_anggaran as $data) : ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['deskripsi']; ?></td>
                                <td><?= $data['created_at']; ?></td>
                                <td>
                                    <a href="<?= base_url('Admin/viewpdf/' . $data['file_anggaran']); ?>"><?= $data['file_anggaran']; ?>"</i></a>
                                </td>
                                <td>
                                    <form action="/Admin/delete_file_anggaran/<?= $data['id']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach ?>
                </table>

            </div>
    </div>
</section>
<?= $this->endSection(); ?>