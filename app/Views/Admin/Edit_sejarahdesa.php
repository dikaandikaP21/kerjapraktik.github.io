<?= $this->extend('Layout/Template-Admin'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <center>
        <?= $judul; ?>

    </center>
    <form action="/Admin/update_sejarahdesa/<?= $sejarah['id']; ?>" method="POST">
        <?= csrf_field(); ?>
        <table class="table">
            <tr>
                <td scope="col">Text Sejarah</td>
                <td>:</td>
                <td>
                    <div class="form-group">
                        <!-- <input class="form-control form-control-lg <?= ($validation->hasError('text_sejarah')) ? 'is-invalid' : ''; ?>" type="text" name="text_sejarah" id="text_sejarah" value="<?= (old('text_sejarah')) ? old('text_sejarah') : $sejarah['text_sejarah'] ?>" rows="3"> -->
                        <textarea class="form-control <?= ($validation->hasError('text_sejarah')) ? 'is-invalid' : ''; ?>" name="text_sejarah" id="text_sejarah" rows="10"><?= $sejarah['text_sejarah'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('text_sejarah'); ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Visi Misi</td>
                <td>:</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control <?= ($validation->hasError('visi_misi')) ? 'is-invalid' : ''; ?>" name="visi_misi" id="visi_misi" rows="10"><?= $sejarah['visi_misi'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('visi_misi'); ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Keterangan Wilayah</td>
                <td>:</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control <?= ($validation->hasError('keterangan_wilayah')) ? 'is-invalid' : ''; ?>" name="keterangan_wilayah" id="keterangan_wilayah" rows="10"><?= $sejarah['keterangan_wilayah'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('keterangan_wilayah'); ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Data Penduduk</td>
                <td>:</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control <?= ($validation->hasError('data_penduduk')) ? 'is-invalid' : ''; ?>" name="data_penduduk" id="data_penduduk" rows="10"><?= $sejarah['data_penduduk'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('data_penduduk'); ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td scope="col">Program Desa</td>
                <td>:</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control <?= ($validation->hasError('program_desa')) ? 'is-invalid' : ''; ?>" name="program_desa" id="program_desa" rows="10"><?= $sejarah['program_desa'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('program_desa'); ?>
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