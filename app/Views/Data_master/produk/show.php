<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>

<main class="p-md-3 p-2">
    <h3 class="mb-3" style="color: #566573;">Detail Produk dan Stok</h3>

    <hr class="mt-0 mb-4">

    <div class="row justify-content-between">

        <div class="col-md-5">
            <h5 class="mb-3 mt-2">Detail Produk</h5>

            <div class="card">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Nama Produk</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['nama'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Kategori</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['kategori'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; SKU</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['sku'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; HS Code</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['hs_code'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Jenis Produk</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['jenis_produk'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Jenis</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['jenis'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Harga Jual</div>
                        </div>
                        <div class="fw-bold me-1">Rp. <?= number_format($produk['harga_jual'], 0, ',', '.') ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Harga Beli</div>
                        </div>
                        <div class="fw-bold me-1">Rp. <?= number_format($produk['harga_beli'], 0, ',', '.') ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Berat</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['berat'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Panjang</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['panjang'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Lebar</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['lebar'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Tinggi</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['tinggi'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Marketing</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['status_marketing'] ?></div>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Gudang</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['gudang'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Stok di Gudang</div>
                        </div>
                        <div class="fw-bold me-1"><?= $produk['stok'] ?> <?= $produk['satuan'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Stok Virtual</div>
                        </div>
                        <div class="fw-bold me-1"><?= ($jenis_produk == 'SET' || $jenis_produk == 'SINGLE') ? $bisa_membuat : $bisa_dipecah ?> <?= $produk['satuan'] ?></div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div>&nbsp;&nbsp; Stok Total</div>
                        </div>
                        <div class="fw-bold me-1"><?= ($jenis_produk == 'SET' || $jenis_produk == 'SINGLE') ? ($bisa_membuat + $produk['stok']) : ($bisa_dipecah + $produk['stok']) ?> <?= $produk['satuan'] ?></div>
                    </li>
                </ol>
            </div>

        </div>

        <div class="col-md-7 table-responsive">

            <?php if ($jenis_produk == 'SET' || $jenis_produk == 'SINGLE') { ?>

                <div class="d-flex mb-0">
                    <div class="me-auto">
                        <h5 class="mb-3 mt-2">List Produk Komponen</h5>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-secondary py-0 mt-2" data-bs-toggle="modal" data-bs-target="#modal-add-komponen">
                            Tambah Komponen <i class="fa-fw fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>

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

                    <h2 class="text-center mt-2"><?= $result ?></h2>

                <?php } ?>

            <?php } else { ?>

                <div class="d-flex mb-0">
                    <div class="me-auto">
                        <h5 class="mb-3 mt-2">List Produk Set</h5>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-secondary py-0 mt-2" data-bs-toggle="modal" data-bs-target="#modal-add-set">
                            Tambah Set <i class="fa-fw fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>

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

                    <h2 class="text-center mt-2"><?= $result ?></h2>

                <?php } ?>

            <?php } ?>

        </div>

    </div>

</main>

<!-- Modal add komponen -->
<div class="modal fade" id="modal-add-komponen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Produk Komponen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-add-bahan" autocomplete="off" action="<?= site_url() ?>produkplan" method="POST">

                    <?= csrf_field() ?>

                    <input type="hidden" name="id_produk_redirect" value="<?= $produk['id'] ?>">
                    <input type="hidden" name="id_produk_jadi" value="<?= $produk['id'] ?>">

                    <label for="id_produk_bahan" class="form-label">Produk</label>
                    <input class="form-control mb-3" list="list_produk_bahan" id="id_produk_bahan" name="id_produk_bahan" placeholder="Cari produk">
                    <datalist id="list_produk_bahan">
                        <?php foreach ($all_plan as $ap) : ?>
                            <option data-value="<?= $ap['id'] ?>" value="<?= $ap['id'] ?>"><?= $ap['nama'] ?></option>
                        <?php endforeach ?>
                    </datalist>

                    <label for="qty_bahan" class="form-label">Jumlah</label>
                    <input type="number" class="form-control mb-3" id="qty_bahan" name="qty_bahan" placeholder="Jumlah produk">

                    <hr>

                    <button class="btn btn-outline-secondary mb-2 btn-sm" id="submit-add-bahan" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal add set -->
<div class="modal fade" id="modal-add-set" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Produk Set</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-add-set" autocomplete="off" action="<?= site_url() ?>produkplan" method="POST">

                    <?= csrf_field() ?>

                    <input type="hidden" name="id_produk_redirect" value="<?= $produk['id'] ?>">
                    <input type="hidden" name="id_produk_bahan" value="<?= $produk['id'] ?>">

                    <label for="id_produk_jadi" class="form-label">Produk</label>
                    <input class="form-control mb-3" list="list_produk_jadi" id="id_produk_jadi" name="id_produk_jadi" placeholder="Cari produk">
                    <datalist id="list_produk_jadi">
                        <?php foreach ($all_plan as $ap) : ?>
                            <option data-value="<?= $ap['id'] ?>" value="<?= $ap['id'] ?>"><?= $ap['nama'] ?></option>
                        <?php endforeach ?>
                    </datalist>

                    <label for="qty_bahan" class="form-label">Jumlah</label>
                    <input type="number" class="form-control mb-3" id="qty_bahan" name="qty_bahan" placeholder="Jumlah produk">

                    <hr>

                    <button class="btn btn-outline-secondary mb-2 btn-sm" id="submit-add-set" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('MyLayout/js') ?>

<?= $this->endSection() ?>