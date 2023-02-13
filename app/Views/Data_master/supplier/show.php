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
                    <h5 class="mb-3 mt-2">Penanggung Jawab</h5>
                </div>
                <div>
                    <button class="btn btn-sm btn-secondary py-0 mt-2" data-bs-toggle="modal" data-bs-target="#modal-add-pj">
                        <i class="fa-fw fa-solid fa-plus"></i>
                    </button>
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
                    <h5 class="mb-3 mt-2">Alamat</h5>
                </div>
                <div>
                    <button class="btn btn-sm btn-secondary py-0 mt-2" data-bs-toggle="modal" data-bs-target="#modal-add-alamat">
                        <i class="fa-fw fa-solid fa-plus"></i>
                    </button>
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
                    <h5 class="mb-3 mt-2">Link</h5>
                </div>
                <div>
                    <button class="btn btn-sm btn-secondary py-0 mt-2" data-bs-toggle="modal" data-bs-target="#modal-add-link">
                        <i class="fa-fw fa-solid fa-plus"></i>
                    </button>
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


<!-- Modal add alamat -->
<div class="modal fade" id="modal-add-alamat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Alamat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form novalidate class="needs-validation" id="form-add-alamat" autocomplete="off" action="<?= site_url() ?>supplieralamat" method="POST">

                    <input type="hidden" name="id_supplier" value="<?= $supplier['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label">Nama Alamat</label>
                        <input required type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <!-- PROVINSI -->
                    <div class="mb-3">
                        <label class="form-label">Provinsi</label>
                        <select required class="form-select" id="id_provinsi" name="id_provinsi">
                            <option selected value=""></option>
                            <?php foreach ($provinsi as $prov) { ?>
                                <option value="<?= $prov['id'] ?>"><?= $prov['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- KOTA -->
                    <div class="mb-3">
                        <label class="form-label">Kota</label>
                        <select required class="form-select" id="id_kota" name="id_kota">
                            <option selected value=""></option>
                        </select>
                    </div>

                    <!-- KECAMATAN -->
                    <div class="mb-3">
                        <label class="form-label">Kecamatan</label>
                        <select required class="form-select" id="id_kecamatan" name="id_kecamatan">
                            <option selected value=""></option>
                        </select>
                    </div>

                    <!-- KELURAHAN -->
                    <div class="mb-3">
                        <label class="form-label">Kelurahan</label>
                        <select required class="form-select" id="id_kelurahan" name="id_kelurahan">
                            <option selected value=""></option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Detail Alamat</label>
                        <input required type="text" class="form-control" id="detail_alamat" name="detail_alamat">
                    </div>

                    <hr class="my-4">

                    <button class="btn btn-outline-secondary mb-2 btn-sm" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal add link -->
<div class="modal fade" id="modal-add-link" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Link</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form novalidate class="needs-validation" id="form-add-link" autocomplete="off" action="<?= site_url() ?>supplierlink" method="POST">

                    <input type="hidden" name="id_supplier" value="<?= $supplier['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input required type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Link</label>
                        <input required type="text" class="form-control" id="link" name="link">
                    </div>

                    <hr class="my-4">

                    <button class="btn btn-outline-secondary mb-2 btn-sm" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal add penanggung jawab -->
<div class="modal fade" id="modal-add-pj" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Penanggung Jawab</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form novalidate class="needs-validation" id="form-add-pj" autocomplete="off" action="<?= site_url() ?>supplierpj" method="POST">

                    <input type="hidden" name="id_supplier" value="<?= $supplier['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label">Penanggung Jawab</label>
                        <select required class="form-control" name="id_user" id="id_user">
                            <option value=""></option>
                            <?php foreach ($users as $us) : ?>
                                <option value="<?= $us['id'] ?>"><?= $us['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Urutan</label>
                        <input required type="number" class="form-control" id="urutan" name="urutan">
                    </div>

                    <hr class="my-4">

                    <button class="btn btn-outline-secondary mb-2 btn-sm" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('MyLayout/js') ?>
<?= $this->include('MyLayout/validation') ?>

<script>
    // Bahan Alert
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        background: '#EC7063',
        color: '#fff',
        iconColor: '#fff',
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    $(document).ready(function() {
        // Alert
        var op = <?= (!empty(session()->getFlashdata('pesan')) ? json_encode(session()->getFlashdata('pesan')) : '""'); ?>;
        if (op != '') {
            Toast.fire({
                icon: 'success',
                title: op
            })
        }
    });


    // RANTAI WILAYAH
    $(document).ready(function() {
        $('#id_provinsi').change(function() {
            let id_provinsi = $(this).val();
            if (id_provinsi != '') {
                $.ajax({
                    type: 'get',
                    url: '<?= site_url('wilayah/kota_by_provinsi') ?>',
                    data: '&id_provinsi=' + id_provinsi,
                    success: function(html) {
                        $('#id_kota').html(html);
                        $('#id_kecamatan').html('<option selected value=""></option>');
                        $('#id_kelurahan').html('<option selected value=""></option>');
                    }
                })
            } else {
                $('#id_kota').html('<option selected value=""></option>');
                $('#id_kecamatan').html('<option selected value=""></option>');
                $('#id_kelurahan').html('<option selected value=""></option>');
            }
        })

        $('#id_kota').change(function() {
            let id_kota = $(this).val();
            if (id_kota != '') {
                $.ajax({
                    type: 'get',
                    url: '<?= site_url('wilayah/kecamatan_by_kota') ?>',
                    data: '&id_kota=' + id_kota,
                    success: function(html) {
                        $('#id_kecamatan').html(html);
                        $('#id_kelurahan').html('<option selected value=""></option>');
                    }
                })
            } else {
                $('#id_kecamatan').html('<option selected value=""></option>');
                $('#id_kelurahan').html('<option selected value=""></option>');
            }
        })

        $('#id_kecamatan').change(function() {
            let id_kecamatan = $(this).val();
            if (id_kecamatan != '') {
                $.ajax({
                    type: 'get',
                    url: '<?= site_url('wilayah/kelurahan_by_kecamatan') ?>',
                    data: '&id_kecamatan=' + id_kecamatan,
                    success: function(html) {
                        $('#id_kelurahan').html(html);
                    }
                })
            } else {
                $('#id_kelurahan').html('<option selected value=""></option>');
            }
        })
    })
</script>

<?= $this->endSection() ?>