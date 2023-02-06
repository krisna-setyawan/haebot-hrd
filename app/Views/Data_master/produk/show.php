<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>

<main class="p-md-3 p-2">
    <h3 class="mb-4" style="color: #566573;">Detail Produk dan Stok</h3>

    <div class="row justify-content-between">

        <div class="col-md-5">
            <h5 class="mb-3 mt-2">Detail Produk</h5>

            <div class="card">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Nama Produk</div>
                        </div>
                        <div class="fw-bold"><?= $produk['nama'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Jenis</div>
                        </div>
                        <div class="fw-bold"><?= $produk['jenis'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Harga Jual</div>
                        </div>
                        <div class="fw-bold">Rp. <?= number_format($produk['harga_jual'], 0, ',', '.') ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Harga Beli</div>
                        </div>
                        <div class="fw-bold">Rp. <?= number_format($produk['harga_beli'], 0, ',', '.') ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Stok di Gudang</div>
                        </div>
                        <div class="fw-bold"><?= $produk['stok'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Stok Virtual</div>
                        </div>
                        <div class="fw-bold"><?= ($jenis_produk == 'SET' || $jenis_produk == 'SINGLE') ? $bisa_membuat : $bisa_dipecah ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>Stok Total</div>
                        </div>
                        <div class="fw-bold"><?= ($jenis_produk == 'SET' || $jenis_produk == 'SINGLE') ? ($bisa_membuat + $produk['stok']) : ($bisa_dipecah + $produk['stok']) ?></div>
                    </li>
                </ol>
            </div>

        </div>

        <div class="col-md-7 table-responsive">

            <?php if ($jenis_produk == 'SET' || $jenis_produk == 'SINGLE') { ?>

                <h5 class="mb-3 mt-2">List Produk Bahan</h5>

                <?php if ($result == 'ok') { ?>

                    <table class="table table-bordered table-striped table-secondary">
                        <thead>
                            <tr class="text-center">
                                <th width="10%" width="10%">No</th>
                                <th width="30%">Produk</th>
                                <th width="20%">Stok</th>
                                <th width="20%">Butuh</th>
                                <th width="20%">Bisa membuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($virtual_stok as $vs) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $vs['nama_produk'] ?></td>
                                    <td class="text-center"><?= $vs['stok_bahan'] ?></td>
                                    <td class="text-center"><?= $vs['qty_bahan'] ?></td>
                                    <td class="text-center"><?= $vs['bisa_membuat'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } else { ?>

                    <h1><?= $result ?></h1>

                <?php } ?>

            <?php } else { ?>

                <h5 class="mb-3 mt-2">List Produk Single</h5>

                <?php if ($result == 'ok') { ?>

                    <table class="table table-bordered table-striped table-secondary">
                        <thead>
                            <tr class="text-center">
                                <th width="10%" width="10%">No</th>
                                <th width="30%">Produk</th>
                                <th width="20%">Stok</th>
                                <th width="20%">Pecahan</th>
                                <th width="20%">Bisa dipecah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($virtual_stok as $vs) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $vs['nama_produk'] ?></td>
                                    <td class="text-center"><?= $vs['stok_jadi'] ?></td>
                                    <td class="text-center"><?= $vs['qty_bahan'] ?></td>
                                    <td class="text-center"><?= $vs['bisa_dipecah'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } else { ?>

                    <h1><?= $result ?></h1>

                <?php } ?>

            <?php } ?>

        </div>

    </div>

</main>

<?= $this->include('MyLayout/js') ?>

<?= $this->endSection() ?>