<?php

use App\Controllers\Admin;
?>
<!--Navbar--->
<nav id="nav-admin" class="navbar navbar-expand-lg navbar-light sticky-top text-uppercase">
    <div class="container">
        <div class="row">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-1 mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Admin'); ?>">Teras Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Admin/Sejarah_desa'); ?>">Sejarah Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Admin/Layanan'); ?>">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Admin/Lembaga'); ?>">Lembaga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Admin/Laporan_anggaran'); ?>">Laporan Anggaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Admin/Aduan'); ?>">Portal Aduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Admin/Perpustakaan'); ?>">Perpustakaan</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Auth/logout') ?>" class="admin"><button alert>logout</button></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
<!---Akhir Navbar-->