<?= $this->extend('Layout/Template-Admin'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="detail-berita">
        <h5>Berita</h5>
        <!-- <form action="isiberita" method="POST">

            <div class="row">
                <div class="col-6" style="align-self: left;">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword-berita" placeholder="Masukkan Pencarian">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                        </div>
                    </div>

                </div>
            </div>

        </form> -->
        <?php
        //  $nomer = 1 + (6 * ($currentPage - 1));
        $nomer = 1;
        ?>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>

            </div>
        <?php endif ?>
        <div class="but">
            <a href="/Admin/conten_berita"><button class="btn-primary">HalamanContent</button></a>
            <a href="/Admin/kategori_berita"><button class="btn-primary">Lihat Kategori</button></a>
            <a href="/Admin/Tambah_isiberita"><button class="btn-primary btn-sm ">+Tambah Data</button></a>
        </div>

        <table class="table" id="tabelperpus">

            <thead>

                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">HAPUS</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($isiberita as $data) : ?>

                    <tr>
                        <th scope="row"><?= $nomer++; ?></th>
                        <td><img src="/berita/<?= $data['gambar']; ?>" class="responsive-img materialboxed" style="width: 60px;"></td>
                        <td><a href="/Admin/Edit_Data_berita/<?= $data['id_berita']; ?>"><?= $data['judul']; ?></a></td>
                        <td><?= $data['kategori']; ?></td>
                        <td>
                            <form action="/Admin/delete_berita/<?= $data['id_berita']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete </button>
                            </form>
                        </td>

                    </tr>
                <?php
                endforeach;
                ?>

            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>