<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>


<main class="p-md-3 p-2">
    <h3 style="color: #566573;">Data Supplier</h3>
    <hr class="mt-0">


    <button class="btn btn-sm btn-success mb-2">Tambah Supplier <i class="fa-fw fa-solid fa-plus"></i></button>

    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="tabel">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($supplier as $sp) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $sp['nama'] ?></td>
                        <td><?= $sp['alamat'] ?></td>
                        <td><?= $sp['no_telp'] ?></td>
                        <td class="text-center">
                            <!-- <button title="Detail" class="btn btn-sm btn-secondary"><i class="fa-fw fa-solid fa-magnifying-glass"></i></button> -->
                            <button title="Edit" class="btn btn-sm btn-info text-light"><i class="fa-fw fa-solid fa-pen"></i></button>
                            <button title="Hapus" class="btn btn-sm btn-danger"><i class="fa-fw fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>

</main>

<script>
    // $('#tabel').dataTable();
</script>


<?= $this->endSection() ?>