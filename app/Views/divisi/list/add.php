<div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" width="100%" id="tabel">
            <thead>
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center" width="30%">Nama</th>
                    <th class="text-center" width="10%">Jabatan</th>
                    <th class="text-center" width="10%">Pendidikan</th>
                    <th class="text-center" width="10%">No Telepon</th>
                    <th class="text-center" width="20%">Email</th>
                    <th class="text-center" width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($karyawan as $karyawan) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $karyawan['nama_lengkap'] ?></td>
                        <td><?= $karyawan['jabatan'] ?></td>
                        <td><?= $karyawan['pendidikan'] ?></td>
                        <td><?= $karyawan['no_telp'] ?></td>
                        <td><?= $karyawan['email'] ?></td>
                        <td class="text-center">
                            <a title="Detail" class="px-2 py-0 btn btn-sm btn-outline-dark" onclick="insertList(<?= $karyawan['id_divisi']?>)">
                                <i class="fa-fw fa-solid fa-plus"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>


<script>

function insertList(id_divisi) {
        $.ajax({
            type: 'GET',
            url: '<?= site_url() ?>insert-list/' + id_divisi,
            dataType: 'json',
            success: function(res) {
                if (res.data) {
                    $('#isiForm').html(res.data)
                    $('#my-modal').modal('toggle')
                    $('#judulModal').html('Detail Karyawan')
                } else {
                    console.log(res)
                }
            },
            error: function(e) {
                alert('Error \n' + e.responseText);
            }
        })
    }

    $(document).ready(function() {
        $("#jenis_kelamin").select2({
            theme: "bootstrap-5",
            tags: true,
            dropdownParent: $('#my-modal')
        });

        $("#agama").select2({
            theme: "bootstrap-5",
            dropdownParent: $('#my-modal')
        });

        $("#pendidikan").select2({
            theme: "bootstrap-5",
            dropdownParent: $('#my-modal')
        });
        $('#tanggal_lahir').datepicker({
            format: "yyyy-mm-dd"
        });

    })
</script>