<?= $this->extend('Layout/Template-Admin'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="detail-berita">
        <h5>Content Berita</h5>
        <?php
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
                    <th scope="col">Gambar</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Categori</th>
                    <th scope="col">HAPUS</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($conten_berita as $data) : ?>

                    <tr>
                        <th scope="row"><?= $nomer++; ?></th>
                        <td><img src="/berita/<?= $data['gambar']; ?>" class="responsive-img materialboxed" style="width: 60px;"></td>
                        <td><a href="/Admin/detail_contenberita/<?= $data['id_berita']; ?>"><?= $data['judul']; ?></a></td>
                        <td><?= $data['kategori']; ?></td>
                        <td>
                            <form action=" /Admin/delete_contenberita/<?= $data['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete </button>
                            </form>
                        </td>

                    </tr>
                <?php
                endforeach;
                ?>

                <a href="/Admin/Tambah_conten_berita"><button class='btn-primary mb-4'>+Tambah Data</button></a>
                <a href="/Admin/isiberita"><button class='btn-info ml-4 mb-4'>Halaman Berita</button></a>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>