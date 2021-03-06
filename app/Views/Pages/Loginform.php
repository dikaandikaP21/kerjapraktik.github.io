<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('Pesan')) : ?>
    <div class="alert alert-danger text-center" role="alert">
        <?= session()->getFlashdata('Pesan'); ?>
    </div>
<?php endif ?>
<div class="container">
    <div class="jumbotron my-5">
        <h2 class="text-center login"><strong>Silahkan Login</strong></h2>
        <form action="<?= base_url('Auth/login_action'); ?>" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username .." required="required">

            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password .." required="required">


            <button type="submit" class="btn bg-success mt-2">Login</button>
            <a href="<?= base_url() ?>">
                <button type="button" class="btn mt-2">Kembali</button>
            </a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>