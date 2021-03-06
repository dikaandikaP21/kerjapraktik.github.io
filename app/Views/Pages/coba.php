<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<?php

use App\Controllers\Captcha;
?>
<?php if (session()->getFlashdata('Pesan')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('Pesan'); ?>
    </div>
<?php endif ?>

<form action="<?= base_url('Captcha/validasi'); ?>">
    <?php
    helper(['form', 'reCaptcha']);

    echo form_open();

    echo reCaptcha2('reCaptcha2', ['id' => 'recaptcha_v2'], ['theme' => 'dark']);

    echo form_submit('submit', 'Submit');

    echo form_close();
    ?>



</form>
<?= $this->endSection(); ?>