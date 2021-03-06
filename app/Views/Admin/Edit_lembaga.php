<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <?= $judul; ?>
    </center>
    <!-- <?php var_dump($id) ?> -->
    <form action="/Admin/update_lembaga/<?= $lembaga['id']; ?>" method="POST">
        <?= csrf_field(); ?>

        <table class="table">
            <tr>
                <td scope="col">Karang Taruna</td>
                <td>:</td>
                <td>

                    <div class="form-group">
                        <!-- <input class="form-control form-control-lg <?= ($validation->hasError('karangtaruna')) ? 'is-invalid' : ''; ?>" type="text" name="karangtaruna" id="karangtaruna" value="<?= (old('karangtaruna')) ? old('karangtaruna') : $lembaga['karangtaruna'] ?>" rows="3"> -->
                        <textarea class="form-control <?= ($validation->hasError('karangtaruna')) ? 'is-invalid' : ''; ?>" name="karangtaruna" id="karangtaruna" rows="10"><?= $lembaga['karangtaruna'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('karangtaruna'); ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">BUMDES</td>
                <td>:</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control <?= ($validation->hasError('bumdes')) ? 'is-invalid' : ''; ?>" name="bumdes" id="bumdes" rows="10"><?= $lembaga['bumdes'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('bumdes'); ?>
                        </div>

                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">TP PKK</td>
                <td>:</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control <?= ($validation->hasError('tp_pkk')) ? 'is-invalid' : ''; ?>" name="tp_pkk" id="tp_pkk" rows="10"><?= $lembaga['tp_pkk'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tp_pkk'); ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">IPMD</td>
                <td>:</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control <?= ($validation->hasError('lpmd')) ? 'is-invalid' : ''; ?>" name="lpmd" id="lpmd" rows="10"><?= $lembaga['lpmd'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('lpmd'); ?>
                        </div>

                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">RT/RW</td>
                <td>:</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control <?= ($validation->hasError('rt_rw')) ? 'is-invalid' : ''; ?>" name="rt_rw" id="rt_rw" rows="10"><?= $lembaga['rt_rw'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('rt_rw'); ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tbody>
                <tr>
                    <td></td>

                </tr>
                <tr>
                    <td><input type="submit" value="Simpan" class="btn btn-succes"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<?= $this->endSection(); ?>