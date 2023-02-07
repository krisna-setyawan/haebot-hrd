<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>

<main class="p-md-3 p-2">
    <h3 class="mb-4" style="color: #566573;">Tambah Jasa</h3>


    <div class="col-md-10 mt-4">

        <form autocomplete="off" class="row g-3 mt-3" action="<?= site_url() ?>jasa" method="POST">

            <?= csrf_field() ?>

            <div class="row mb-3">
                <label for="nama" class="col-sm-3 col-form-label">Nama Jasa</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>">
                    <div class="invalid-feedback"> <?= validation_show_error('nama'); ?></div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="biaya" class="col-sm-3 col-form-label">Biaya</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control <?= (validation_show_error('biaya')) ? 'is-invalid' : ''; ?>" id="biaya" name="biaya" value="<?= old('biaya'); ?>">
                        <div class="invalid-feedback"><?= validation_show_error('biaya'); ?></div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control <?= (validation_show_error('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>">
                    <div class="invalid-feedback"><?= validation_show_error('deskripsi'); ?></div>
                </div>
            </div>

            <div class="col-md-9 offset-3">
                <a href="<?= site_url() ?>jasa">
                    <button class="btn px-5 btn-danger" type="button">Batal <i class="fa-fw fa-solid fa-xmark"></i></button>
                </a>
                <button class="btn px-5 btn-primary" type="submit">Simpan <i class="fa-fw fa-solid fa-check"></i></button>
            </div>
        </form>

    </div>
</main>

<?= $this->include('MyLayout/js') ?>

<script>
    $(document).ready(function() {
        $('#biaya').mask('000.000.000', {
            reverse: true
        });
    })
</script>

<?= $this->endSection() ?>