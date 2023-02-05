<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>


<main class="p-md-3 p-2">

    <div class="d-flex mb-0">
        <div class="me-auto">
            <h3 style="color: #566573;">Data Jasa</h3>
        </div>
        <div>
            <a href="<?= site_url() ?>jasa/new">
                <button class="btn btn-sm btn-secondary mb-3">
                    Tambah Jasa <i class="fa-fw fa-solid fa-plus"></i>
                </button>
            </a>
        </div>
    </div>

    <hr class="mt-0 mb-4">

    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="tabel">
            <thead>
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center" width="25%">Nama</th>
                    <th class="text-center" width="40%">Deskripsi</th>
                    <th class="text-center" width="15%">Biaya</th>
                    <th class="text-center" width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($jasa as $sp) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $sp['nama'] ?></td>
                        <td><?= $sp['deskripsi'] ?></td>
                        <td>Rp. <?= number_format($sp['biaya'], 0, ',', '.') ?></td>
                        <td class="text-center">
                            <!-- <button title="Detail" class="btn btn-sm btn-secondary"><i class="fa-fw fa-solid fa-magnifying-glass"></i></button> -->
                            <a href="<?= site_url() ?>jasa/<?= $sp['slug'] ?>/edit">
                                <button title="Edit" class="btn btn-sm btn-primary"><i class="fa-fw fa-solid fa-pen"></i></button>
                            </a>

                            <form id="form_delete" method="POST" class="d-inline">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                            <button onclick="confirm_delete(<?= $sp['id'] ?>)" title="Hapus" type="button" class="btn btn-sm btn-danger"><i class="fa-fw fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>

</main>

<?= $this->include('MyLayout/js') ?>

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
        $('#tabel').DataTable();

        // Alert
        var op = <?= (!empty(session()->getFlashdata('pesan')) ? json_encode(session()->getFlashdata('pesan')) : '""'); ?>;
        if (op != '') {
            Toast.fire({
                icon: 'success',
                title: op
            })
        }
    });


    function confirm_delete(id) {
        Swal.fire({
            title: 'Konfirmasi?',
            text: "Apakah yakin menghapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form_delete').attr('action', '<?= site_url() ?>jasa/' + id);
                $('#form_delete').submit();
            }
        })
    }
</script>

<?= $this->endSection() ?>