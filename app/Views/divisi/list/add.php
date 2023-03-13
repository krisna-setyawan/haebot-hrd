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
                        <!-- <div>
                            <button class="btn btn-sm btn-secondary mb-2 py-0" data-bs-toggle="modal" data-bs-target="#modal-add-pj">
                                <i class="fa-fw fa-solid fa-plus"></i>
                            </button>
                        </div> -->
                        <div>
                            <button class="btn btn-sm btn-secondary mb-2 py-0" id="btnPlus" data-id-divisi="<?= $id_divisi ?>" data-bs-toggle="modal">
                                <i class="fa-fw fa-solid fa-plus"></i>
                            </button>
                        </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>


<script>
    // $('#form').submit(function(e) {
    //     e.preventDefault();

    //     $.ajax({
    //         type: "post",
    //         url: $(this).attr('action'),
    //         data: $(this).serialize(),
    //         dataType: "json",
    //         beforeSend: function() {
    //             $('#tombolSimpan').html('Tunggu <i class="fa-solid fa-spin fa-spinner"></i>');
    //             $('#tombolSimpan').prop('disabled', true);
    //         },
    //         complete: function() {
    //             $('#tombolSimpan').html('Simpan <i class="fa-fw fa-solid fa-check"></i>');
    //             $('#tombolSimpan').prop('disabled', false);
    //         },
    //         success: function(response) {
    //             if (response.error) {
    //                 let err = response.error;

    //                 if (err.error_id_divisi) {
    //                     $('.error-id_divisi').html(err.error_nik);
    //                     $('#id_divisi').addClass('is-invalid');
    //                 } else {
    //                     $('.error-id_divisi').html('');
    //                     $('#id_divisi').removeClass('is-invalid');
    //                     $('#id_divisi').addClass('is-valid');
    //                 }
    //                 if (err.error_nik) {
    //                     $('.error-nik').html(err.error_nik);
    //                     $('#nik').addClass('is-invalid');
    //                 } else {
    //                     $('.error-nik').html('');
    //                     $('#nik').removeClass('is-invalid');
    //                     $('#nik').addClass('is-valid');
    //                 }
    //                 if (err.error_nama_lengkap) {
    //                     $('.error-nama_lengkap').html(err.error_nama_lengkap);
    //                     $('#nama_lengkap').addClass('is-invalid');
    //                 } else {
    //                     $('.error-nama_lengkap').html('');
    //                     $('#nama_lengkap').removeClass('is-invalid');
    //                     $('#nama_lengkap').addClass('is-valid');
    //                 }
    //                 if (err.error_jabatan) {
    //                     $('.error-jabatan').html(err.error_jabatan);
    //                     $('#jabatan').addClass('is-invalid');
    //                 } else {
    //                     $('.error-jabatan').html('');
    //                     $('#jabatan').removeClass('is-invalid');
    //                     $('#jabatan').addClass('is-valid');
    //                 }
    //                 if (err.error_alamat) {
    //                     $('.error-alamat').html(err.error_alamat);
    //                     $('#alamat').addClass('is-invalid');
    //                 } else {
    //                     $('.error-alamat').html('');
    //                     $('#alamat').removeClass('is-invalid');
    //                     $('#alamat').addClass('is-valid');
    //                 }
    //                 if (err.error_jenis_kelamin) {
    //                     $('.error-jenis_kelamin').html(err.error_jenis_kelamin);
    //                     $('#jenis_kelamin').addClass('is-invalid');
    //                 } else {
    //                     $('.error-jenis_kelamin').html('');
    //                     $('#jenis_kelamin').removeClass('is-invalid');
    //                     $('#jenis_kelamin').addClass('is-valid');
    //                 }
    //                 if (err.error_tempat_lahir) {
    //                     $('.error-tempat_lahir').html(err.error_tempat_lahir);
    //                     $('#tempat_lahir').addClass('is-invalid');
    //                 } else {
    //                     $('.error-tempat_lahir').html('');
    //                     $('#tempat_lahir').removeClass('is-invalid');
    //                     $('#tempat_lahir').addClass('is-valid');
    //                 }
    //                 if (err.error_tanggal_lahir) {
    //                     $('.error-tanggal_lahir').html(err.error_tanggal_lahir);
    //                     $('#tanggal_lahir').addClass('is-invalid');
    //                 } else {
    //                     $('.error-tanggal_lahir').html('');
    //                     $('#tanggal_lahir').removeClass('is-invalid');
    //                     $('#tanggal_lahir').addClass('is-valid');
    //                 }
    //                 if (err.error_agama) {
    //                     $('.error-agama').html(err.error_agama);
    //                     $('#agama').addClass('is-invalid');
    //                 } else {
    //                     $('.error-agama').html('');
    //                     $('#agama').removeClass('is-invalid');
    //                     $('#agama').addClass('is-valid');
    //                 }
    //                 if (err.error_pendidikan) {
    //                     $('.error-pendidikan').html(err.error_pendidikan);
    //                     $('#pendidikan').addClass('is-invalid');
    //                 } else {
    //                     $('.error-pendidikan').html('');
    //                     $('#pendidikan').removeClass('is-invalid');
    //                     $('#pendidikan').addClass('is-valid');
    //                 }
    //                 if (err.error_no_telp) {
    //                     $('.error-no_telp').html(err.error_no_telp);
    //                     $('#no_telp').addClass('is-invalid');
    //                 } else {
    //                     $('.error-no_telp').html('');
    //                     $('#no_telp').removeClass('is-invalid');
    //                     $('#no_telp').addClass('is-valid');
    //                 }
    //                 if (err.error_email) {
    //                     $('.error-email').html(err.error_email);
    //                     $('#email').addClass('is-invalid');
    //                 } else {
    //                     $('.error-email').html('');
    //                     $('#email').removeClass('is-invalid');
    //                     $('#email').addClass('is-valid');
    //                 }
    //                 if (err.error_username) {
    //                     $('.error-username').html(err.error_username);
    //                     $('#username').addClass('is-invalid');
    //                 } else {
    //                     $('.error-username').html('');
    //                     $('#username').removeClass('is-invalid');
    //                     $('#username').addClass('is-valid');
    //                 }
    //                 if (err.error_password) {
    //                     $('.error-password').html(err.error_password);
    //                     $('#password').addClass('is-invalid');
    //                 } else {
    //                     $('.error-password').html('');
    //                     $('#password').removeClass('is-invalid');
    //                     $('#password').addClass('is-valid');
    //                 }
    //             }
    //             if (response.success) {
    //                 $('#my-modal').modal('hide')
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'Berhasil',
    //                     text: response.success,
    //                 }).then((value) => {
    //                     // $('#tabel').DataTable().ajax.reload();
    //                     Toast.fire({
    //                         icon: 'success',
    //                         title: response.success
    //                     })
    //                 })
    //             }
    //         },
    //         error: function(e) {
    //             alert('Error \n' + e.responseText);
    //         }
    //     });
    //     return false
    // })

    $(document).ready(function() {
    $("#btnPlus").click(function() {
        var idDivisi = $(this).data("id-divisi");
        $.ajax({
            url: "/controller/create",
            type: "POST",
            data: { id_divisi: idDivisi },
            success: function(result) {
                console.log(result);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
            });
        });
    });


    $(document).ready(function() {
        // $("#id_divisi").select2({
        //     theme: "bootstrap-5",
        //     tags: true,
        //     dropdownParent: $('#my-modal')
        // });
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