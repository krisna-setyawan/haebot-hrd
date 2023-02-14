<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>

<main class="p-md-3 p-2">
    <div class="d-flex mb-0">
        <div class="me-auto mb-1">
            <h3 style="color: #566573;">Edit Customer</h3>
        </div>
        <div class="me-2 mb-1">
            <a class="btn btn-sm btn-outline-dark" href="<?= site_url() ?>customer">
                <i class="fa-fw fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <hr class="mt-0 mb-4">

    <div class="row">
        <div class="col-md-7">

            <form autocomplete="off" class="row mt-0 mb-4" action="<?= site_url() ?>customer/<?= $customer['id'] ?>" method="POST">

                <?= csrf_field() ?>

                <input type="hidden" name="_method" value="PUT">

                <div class="mb-3">
                    <label class="form-label text-secondary" for="origin">Origin</label>
                    <input type="text" class="form-control <?= (validation_show_error('origin')) ? 'is-invalid' : ''; ?>" id="origin" name="origin" value="<?= old('origin', $customer['origin']); ?>">
                    <div class="invalid-feedback"> <?= validation_show_error('origin'); ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary" for="nama">Nama Customer</label>
                    <input type="text" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama', $customer['nama']); ?>">
                    <div class="invalid-feedback"> <?= validation_show_error('nama'); ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary" for="alamat">Alamat</label>
                    <input type="text" class="form-control <?= (validation_show_error('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat', $customer['alamat']); ?>">
                    <div class="invalid-feedback"><?= validation_show_error('alamat'); ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary" for="no_telp">No Telp</label>
                    <input type="text" class="form-control <?= (validation_show_error('no_telp')) ? 'is-invalid' : ''; ?>" id="no_telp" name="no_telp" value="<?= old('no_telp', $customer['no_telp']); ?>">
                    <div class="invalid-feedback"><?= validation_show_error('no_telp'); ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary" for="email">Email</label>
                    <input type="text" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email', $customer['email']); ?>">
                    <div class="invalid-feedback"><?= validation_show_error('email'); ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary" for="saldo_utama">Saldo Utama</label>
                    <input type="text" class="form-control <?= (validation_show_error('saldo_utama')) ? 'is-invalid' : ''; ?>" id="saldo_utama" name="saldo_utama" value="<?= old('saldo_utama', $customer['saldo_utama']); ?>">
                    <div class="invalid-feedback"><?= validation_show_error('saldo_utama'); ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary" for="saldo_belanja">Saldo Belanja</label>
                    <input type="text" class="form-control <?= (validation_show_error('saldo_belanja')) ? 'is-invalid' : ''; ?>" id="saldo_belanja" name="saldo_belanja" value="<?= old('saldo_belanja', $customer['saldo_belanja']); ?>">
                    <div class="invalid-feedback"><?= validation_show_error('saldo_belanja'); ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary" for="saldo_lain">Saldo Lain</label>
                    <input type="text" class="form-control <?= (validation_show_error('saldo_lain')) ? 'is-invalid' : ''; ?>" id="saldo_lain" name="saldo_lain" value="<?= old('saldo_lain', $customer['saldo_lain']); ?>">
                    <div class="invalid-feedback"><?= validation_show_error('saldo_lain'); ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary" for="tgl_registrasi">Tgl Registrasi</label>
                    <input type="text" class="form-control <?= (validation_show_error('tgl_registrasi')) ? 'is-invalid' : ''; ?>" id="tgl_registrasi" name="tgl_registrasi" value="<?= old('tgl_registrasi', $customer['tgl_registrasi']); ?>">
                    <div class="invalid-feedback"><?= validation_show_error('tgl_registrasi'); ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary" for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option <?= (old('status', $customer['status']) == 'Active') ? 'selected' : ''; ?> value="Active">Active</option>
                        <option <?= (old('status', $customer['status']) == 'Inactive') ? 'selected' : ''; ?> value="Inactive">Inactive</option>
                    </select>
                    <div class="invalid-feedback error-status"><?= validation_show_error('status'); ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary" for="note">Note</label>
                    <input type="text" class="form-control <?= (validation_show_error('note')) ? 'is-invalid' : ''; ?>" id="note" name="note" value="<?= old('note', $customer['note']); ?>">
                    <div class="invalid-feedback"><?= validation_show_error('note'); ?></div>
                </div>

                <div class="col-md-9 offset-3">
                    <a class="btn px-5 btn-outline-danger" href="<?= site_url() ?>customer">
                        Batal <i class="fa-fw fa-solid fa-xmark"></i>
                    </a>
                    <button class="btn px-5 btn-outline-primary" type="submit">Simpan <i class="fa-fw fa-solid fa-check"></i></button>
                </div>
            </form>

        </div>

        <div class="col-md-5">
            <div class="d-flex mb-0">
                <div class="me-auto">
                    <h5 class="mb-3 mt-0">Nomor Rekening</h5>
                </div>
                <div>
                    <button class="btn btn-sm btn-secondary py-0 mt-0" data-bs-toggle="modal" data-bs-target="#modal-add-rekening">
                        <i class="fa-fw fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-secondary">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th width="40%">Nama</th>
                            <th width="45%">No Rekening</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($rekening as $rek) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $rek['nama'] ?></td>
                                <td><?= $rek['no_rekening'] ?></td>
                                <td class="text-center">
                                    <form id="form_delete_rekening" method="POST" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id_customer" value="<?= $customer['id'] ?>">
                                    </form>
                                    <button onclick="confirm_delete_rekening(<?= $rek['id'] ?>)" title="Hapus" type="button" class="px-2 py-0 btn btn-sm btn-outline-danger"><i class="fa-fw fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</main>


<!-- Modal add rekening -->
<div class="modal fade" id="modal-add-rekening" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Rekening</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form novalidate class="needs-validation" id="form-add-rekening" autocomplete="off" action="<?= site_url() ?>customerrekening" method="POST">

                    <?= csrf_field() ?>

                    <input type="hidden" name="id_customer" value="<?= $customer['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label text-secondary">Nama</label>
                        <input required type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">No Rekening</label>
                        <input required type="text" class="form-control" id="no_rekening" name="no_rekening">
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
    $(document).ready(function() {
        $('#saldo_utama').mask('000.000.000', {
            reverse: true
        });
        $('#saldo_belanja').mask('000.000.000', {
            reverse: true
        });
        $('#saldo_lain').mask('000.000.000', {
            reverse: true
        });
        $('#tgl_registrasi').datepicker({
            format: "yyyy-mm-dd"
        });

        // Alert
        var op = <?= (!empty(session()->getFlashdata('pesan')) ? json_encode(session()->getFlashdata('pesan')) : '""'); ?>;
        if (op != '') {
            Toast.fire({
                icon: 'success',
                title: op
            })
        }
    })


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



    function confirm_delete_rekening(id) {
        Swal.fire({
            title: 'Konfirmasi?',
            text: "Apakah yakin menghapus rekening?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form_delete_rekening').attr('action', '<?= site_url() ?>customerrekening/' + id);
                $('#form_delete_rekening').submit();
            }
        })
    }
</script>

<?= $this->endSection() ?>