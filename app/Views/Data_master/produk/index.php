<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>


<main class="p-md-3 p-2">

    <div class="d-flex mb-0">
        <div class="me-auto">
            <h3 style="color: #566573;">Data Produk</h3>
        </div>
        <div>
            <a href="<?= site_url() ?>produk/new">
                <button class="btn btn-sm btn-secondary mb-3">
                    Tambah Produk <i class="fa-fw fa-solid fa-plus"></i>
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
                    <th class="text-center" width="30%">Nama</th>
                    <th class="text-center" width="10%">Jenis</th>
                    <th class="text-center" width="15%">Harga Beli</th>
                    <th class="text-center" width="15%">Harga Jual</th>
                    <th class="text-center" width="10%">Stok</th>
                    <th class="text-center" width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($produk as $sp) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $sp['nama'] ?></td>
                        <td><?= $sp['jenis'] ?></td>
                        <td>Rp. <?= number_format($sp['harga_beli'], 0, ',', '.') ?></td>
                        <td>Rp. <?= number_format($sp['harga_jual'], 0, ',', '.') ?></td>
                        <td><?= $sp['stok'] ?></td>
                        <td class="text-center">
                            <a href="<?= site_url() ?>produk/<?= $sp['id'] ?>">
                                <button title="Stok Virtual" class="btn btn-sm btn-info"><i class="fa-fw fa-solid fa-magnifying-glass"></i></button>
                            </a>

                            <a href="<?= site_url() ?>produk/<?= $sp['slug'] ?>/edit">
                                <button title="Edit" class="btn btn-sm btn-warning"><i class="fa-fw fa-solid fa-pen"></i></button>
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
                $('#form_delete').attr('action', '<?= site_url() ?>produk/' + id);
                $('#form_delete').submit();
            }
        })
    }
</script>

<?= $this->endSection() ?>