<div>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">Origin</div>
        </div>
        <div class="col-md-9">
            <?= $customer['origin'] ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">Nama Customer</div>
        </div>
        <div class="col-md-9">
            <?= $customer['nama'] ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">Alamat</div>
        </div>
        <div class="col-md-9">
            <?= $customer['alamat'] ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">Telepon</div>
        </div>
        <div class="col-md-9">
            <?= $customer['no_telp'] ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">Email</div>
        </div>
        <div class="col-md-9">
            <?= $customer['email'] ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">Saldo Utama</div>
        </div>
        <div class="col-md-9">
            Rp. <?= number_format($customer['saldo_utama'], 0, ',', '.'); ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">Saldo Belanja</div>
        </div>
        <div class="col-md-9">
            Rp. <?= number_format($customer['saldo_belanja'], 0, ',', '.'); ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">Saldo Lain</div>
        </div>
        <div class="col-md-9">
            Rp. <?= number_format($customer['saldo_lain'], 0, ',', '.'); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">No Rekening</div>
        </div>
        <div class="col-md-9">
            <?php foreach ($rekening as $rek) : ?>
                <p class="mb-2"><?= $rek['nama'] ?> : <?= $rek['no_rekening'] ?></p>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">Tgl Registrasi</div>
        </div>
        <div class="col-md-9">
            <?= $customer['tgl_registrasi'] ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">Status</div>
        </div>
        <div class="col-md-9">
            <?= $customer['status'] ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="fw-bold">Note</div>
        </div>
        <div class="col-md-9">
            <?= $customer['note'] ?>
        </div>
    </div>
</div>