<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>

<main class="p-md-3 p-2">
    <h3 class="mb-4" style="color: #566573;">Edit Produk</h3>


    <div class="col-md-10 mt-4">

        <form autocomplete="off" class="row g-3 mt-3" action="<?= site_url() ?>produk/<?= $produk['id'] ?>" method="POST">

            <?= csrf_field() ?>

            <input type="hidden" name="_method" value="PUT">

            <div class="row mb-3">
                <label for="nama" class="col-sm-3 col-form-label">Nama Produk</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama', $produk['nama']); ?>">
                    <div class="invalid-feedback"> <?= validation_show_error('nama'); ?></div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                <div class="col-sm-9">
                    <select class="form-control <?= (validation_show_error('jenis')) ? 'is-invalid' : ''; ?>" name="jenis" id="jenis">
                        <option <?= (old('jenis', $produk['jenis']) == 'UNKNOWN') ? 'selected' : ''; ?> value="UNKNOWN"></option>
                        <option <?= (old('jenis', $produk['jenis']) == 'SET') ? 'selected' : ''; ?> value="SET">SET</option>
                        <option <?= (old('jenis', $produk['jenis']) == 'SINGLE') ? 'selected' : ''; ?> value="SINGLE">SINGLE</option>
                        <option <?= (old('jenis', $produk['jenis']) == 'ECER') ? 'selected' : ''; ?> value="ECER">ECER</option>
                    </select>
                    <div class="invalid-feedback"><?= validation_show_error('jenis'); ?></div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="harga_beli" class="col-sm-3 col-form-label">Harga Beli</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control <?= (validation_show_error('harga_beli')) ? 'is-invalid' : ''; ?>" id="harga_beli" name="harga_beli" value="<?= old('harga_beli', $produk['harga_beli']); ?>">
                    </div>
                    <div class="invalid-feedback"><?= validation_show_error('harga_beli'); ?></div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="harga_jual" class="col-sm-3 col-form-label">Harga Jual</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control <?= (validation_show_error('harga_jual')) ? 'is-invalid' : ''; ?>" id="harga_jual" name="harga_jual" value="<?= old('harga_jual', $produk['harga_jual']); ?>">
                    </div>
                    <div class="invalid-feedback"><?= validation_show_error('harga_jual'); ?></div>
                </div>
            </div>

            <div class="col-md-9 offset-3">
                <a href="<?= site_url() ?>produk">
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
        $('#harga_beli').mask('000.000.000', {
            reverse: true
        });
        $('#harga_jual').mask('000.000.000', {
            reverse: true
        });
    })
</script>

<?= $this->endSection() ?>