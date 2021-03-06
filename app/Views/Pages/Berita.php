<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="tampil-berita">
                <h1><?= $berita['judul']; ?> </h1>
                <img src="/berita/<?= $berita['gambar']; ?>">
                <div class="isi-berita"><?= $berita['isi_berita']; ?> <?= $kategori['kategori']; ?>,</div>
            </div>
        </div>
        <div class="col-3">
            <div class="aside-news">
                <div class="news-aside-image">
                    <img src="/image-bukti/1614539170_b2d067d03edc4da01424.jpg">
                    <div class="news-aside-box">
                        <h1>2</h1>
                        <p>Feb</p>
                    </div>
                </div>
                <div class="news-aside-txt">
                    <span>Kategori</span>
                    <h2>Terserah apa aja yang penting judul</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>