<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>

<main class="p-md-3 p-2">
    <h3 class="mb-3" style="color: #566573;">Edit Jasa</h3>

    <hr class="mt-0 mb-4">

    <div class="col-md-10 mt-4">

        <form autocomplete="off" class="row g-3 mt-3" action="<?= site_url() ?>jasa/<?= $jasa['id'] ?>" method="POST">

            <?= csrf_field() ?>

            <input type="hidden" name="_method" value="PUT">

            <div class="row mb-3">
                <label for="nama" class="col-sm-3 col-form-label">Nama Jasa</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama', $jasa['nama']); ?>">
                    <div class="invalid-feedback"> <?= validation_show_error('nama'); ?></div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="biaya" class="col-sm-3 col-form-label">Biaya</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control <?= (validation_show_error('biaya')) ? 'is-invalid' : ''; ?>" id="biaya" name="biaya" value="<?= old('biaya', $jasa['biaya']); ?>">
                        <div class="invalid-feedback"><?= validation_show_error('biaya'); ?></div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control <?= (validation_show_error('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" value="<?= old('deskripsi', $jasa['deskripsi']); ?>">
                    <div class="invalid-feedback"><?= validation_show_error('deskripsi'); ?></div>
                </div>
            </div>

            <div class="col-md-9 offset-3">
                <a class="btn px-5 btn-outline-danger" href="<?= site_url() ?>jasa">
                    Batal <i class="fa-fw fa-solid fa-xmark"></i>
                </a>
                <button class="btn px-5 btn-outline-primary" type="submit">Simpan <i class="fa-fw fa-solid fa-check"></i></button>
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