<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>


<main class="p-md-3 p-2">
    <h3 class="mb-4" style="color: #566573;">Data Supplier</h3>

    <a href="<?= site_url() ?>supplier/new">
        <button class="btn btn-sm btn-secondary mb-3">
            Tambah Supplier <i class="fa-fw fa-solid fa-plus"></i>
        </button>
    </a>

    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="tabel">
            <thead>
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center" width="20%">Nama</th>
                    <th class="text-center" width="15%">Pemilik</th>
                    <th class="text-center" width="30%">Alamat</th>
                    <th class="text-center" width="15%">Telp</th>
                    <th class="text-center" width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($supplier as $sp) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $sp['nama'] ?></td>
                        <td><?= $sp['pemilik'] ?></td>
                        <td><?= $sp['alamat'] ?></td>
                        <td><?= $sp['no_telp'] ?></td>
                        <td class="text-center">
                            <!-- <button title="Detail" class="btn btn-sm btn-secondary"><i class="fa-fw fa-solid fa-magnifying-glass"></i></button> -->
                            <a href="<?= site_url() ?>supplier/<?= $sp['slug'] ?>/edit">
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
                $('#form_delete').attr('action', '<?= site_url() ?>supplier/' + id);
                $('#form_delete').submit();
            }
        })
    }
</script>

<?= $this->endSection() ?>