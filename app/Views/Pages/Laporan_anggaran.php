<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<!--Content-->
<section class="features bg-light">
    <div class="container">
        <h1>Laporan Anggaran</h1>

        <?php $no = 1; ?>
        <?php foreach ($laporan_anggaran as $data) : ?>
            <div class="row">
                <div class="col">
                    <table border="0" class="mt-5">
                        <tr>
                            <td>No</td>
                            <td>:</td>
                            <td><?= $no++ ?></td>
                        </tr>
                        <tr>
                            <td>Nama File</td>
                            <td>:</td>
                            <td><?= $data['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td><?= $data['deskripsi']; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?= base_url('Pages/viewpdf/' . $data['file_anggaran']); ?>">Download</a>
                            </td>
                        </tr>
                    </table>
                    <div class="row-sm-12">
                        <embed src="<?= base_url('anggaran/' . $data['file_anggaran']); ?>" type="application/pdf" width="100%" height="600px" />
                        <!-- <iframe src="<?= base_url('anggaran/' . $data['file_anggaran']); ?>" width="100%" height="200" title="Iframe" style="border-none"></iframe> -->
                    </div>

                </div>
                <div class="col">
                    <table border="0" class="mt-5">
                        <tr>
                            <td>Tanggal Upload</td>
                            <td>:</td>
                            <td><?= $data['created_at']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endforeach ?>


    </div>
</section>
<!--Akhir Content-->
<?= $this->endSection(); ?>