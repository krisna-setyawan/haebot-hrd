<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>

<main class="p-md-3 p-2">
    <div class="d-flex mb-0">
        <div class="me-auto mb-1">
            <h3 style="color: #566573;">Detail Supplier</h3>
        </div>
        <div class="me-2 mb-1">
            <a class="btn btn-sm btn-outline-dark" href="<?= site_url() ?>supplier">
                <i class="fa-fw fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <hr class="mt-0 mb-4">

    <div class="row">
        <div class="col-md-6 mt-0 mb-4">

            <div class="card">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Origin</div>
                        </div>
                        <div class="fw-bold"><?= $supplier['origin'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Nama Supplier</div>
                        </div>
                        <div class="fw-bold"><?= $supplier['nama'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Pemilik</div>
                        </div>
                        <div class="fw-bold"><?= $supplier['pemilik'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Telepon</div>
                        </div>
                        <div class="fw-bold"><?= $supplier['no_telp'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Saldo</div>
                        </div>
                        <div class="fw-bold">Rp. <?= number_format($supplier['saldo'], 0, ',', '.'); ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Status</div>
                        </div>
                        <div class="fw-bold"><?= $supplier['status'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Note</div>
                        </div>
                        <div class="fw-bold"><?= $supplier['note'] ?></div>
                    </li>
                </ol>
            </div>

        </div>
        <div class="col-md-6 mt-0 mb-4">

            <div class="d-flex mb-0">
                <div class="me-auto">
                    <h5 class="mb-2">Penanggung Jawab</h5>
                </div>
            </div>
            <div class="table-responsive mb-4">
                <table class="table table-bordered table-striped table-primary">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th width="70%">Penanggung Jawab</th>
                            <th width="25%">Urutan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pj as $pj) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $pj['nama_pj'] ?></td>
                                <td><?= $pj['urutan'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mt-0 mb-4">
            <div class="d-flex mb-0">
                <div class="me-auto">
                    <h5 class="mb-2">Alamat</h5>
                </div>
            </div>
            <div class="table-responsive mb-4">
                <table class="table table-bordered table-striped table-secondary">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th width="25%">Nama</th>
                            <th width="70%">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($alamat as $al) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $al['nama'] ?></td>
                                <td>
                                    <?= $al['detail_alamat'] ?>, <?= $al['kelurahan'] ?>, <?= $al['kecamatan'] ?>, <?= $al['kota'] ?>, <?= $al['provinsi'] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-md-6 mt-0 mb-4">

            <div class="d-flex mb-0">
                <div class="me-auto">
                    <h5 class="mb-2">Link</h5>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-secondary">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th width="25%">Nama</th>
                            <th width="70%">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($link as $li) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $li['nama'] ?></td>
                                <td><?= $li['link'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>

<?= $this->include('MyLayout/js') ?>
<?= $this->include('MyLayout/validation') ?>


<?= $this->endSection() ?>