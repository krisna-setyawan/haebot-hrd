<form id="form" autocomplete="off" class="row g-3 mt-2 mb-3" action="<?= site_url() ?>produk/<?= $produk['id'] ?>" method="POST">

    <?= csrf_field() ?>

    <input type="hidden" name="_method" value="PUT">

    <div class="row mb-3">
        <label for="nama" class="col-sm-3 col-form-label">Nama Produk</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $produk['nama']; ?>">
            <div class="invalid-feedback error-nama"></div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
        <div class="col-sm-9">
            <select class="form-control" name="jenis" id="jenis">
                <option <?= ($produk['jenis'] == '') ? 'selected' : ''; ?> value=""></option>
                <option <?= ($produk['jenis'] == 'SET') ? 'selected' : ''; ?> value="SET">SET</option>
                <option <?= ($produk['jenis'] == 'SINGLE') ? 'selected' : ''; ?> value="SINGLE">SINGLE</option>
                <option <?= ($produk['jenis'] == 'ECER') ? 'selected' : ''; ?> value="ECER">ECER</option>
            </select>
            <div class="invalid-feedback error-jenis"></div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="harga_beli" class="col-sm-3 col-form-label">Harga Beli</label>
        <div class="col-sm-9">
            <div class="input-group">
                <span class="input-group-text">Rp.</span>
                <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="<?= $produk['harga_beli'] ?>">
                <div class="invalid-feedback error-harga_beli"></div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="harga_jual" class="col-sm-3 col-form-label">Harga Jual</label>
        <div class="col-sm-9">
            <div class="input-group">
                <span class="input-group-text">Rp.</span>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="<?= $produk['harga_jual'] ?>">
                <div class="invalid-feedback error-harga_jual"></div>
            </div>
        </div>
    </div>

    <div class="col-md-9 offset-3">
        <button id="tombolSimpan" class="btn px-5 btn-outline-primary" type="submit">Simpan <i class="fa-fw fa-solid fa-check"></i></button>
    </div>
</form>



<script>
    $('#form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('#tombolSimpan').html('Tunggu <i class="fa-solid fa-spin fa-spinner"></i>');
                $('#tombolSimpan').prop('disabled', true);
            },
            complete: function() {
                $('#tombolSimpan').html('Simpan <i class="fa-fw fa-solid fa-check"></i>');
                $('#tombolSimpan').prop('disabled', false);
            },
            success: function(response) {
                if (response.error) {
                    let err = response.error;

                    if (err.error_nama) {
                        $('.error-nama').html(err.error_nama);
                        $('#nama').addClass('is-invalid');
                    } else {
                        $('.error-nama').html('');
                        $('#nama').removeClass('is-invalid');
                        $('#nama').addClass('is-valid');
                    }
                    if (err.error_jenis) {
                        $('.error-jenis').html(err.error_jenis);
                        $('#jenis').addClass('is-invalid');
                    } else {
                        $('.error-jenis').html('');
                        $('#jenis').removeClass('is-invalid');
                        $('#jenis').addClass('is-valid');
                    }
                    if (err.error_harga_beli) {
                        $('.error-harga_beli').html(err.error_harga_beli);
                        $('#harga_beli').addClass('is-invalid');
                    } else {
                        $('.error-harga_beli').html('');
                        $('#harga_beli').removeClass('is-invalid');
                        $('#harga_beli').addClass('is-valid');
                    }
                    if (err.error_harga_jual) {
                        $('.error-harga_jual').html(err.error_harga_jual);
                        $('#harga_jual').addClass('is-invalid');
                    } else {
                        $('.error-harga_jual').html('');
                        $('#harga_jual').removeClass('is-invalid');
                        $('#harga_jual').addClass('is-valid');
                    }
                    if (err.error_stok) {
                        $('.error-stok').html(err.error_stok);
                        $('#stok').addClass('is-invalid');
                    } else {
                        $('.error-stok').html('');
                        $('#stok').removeClass('is-invalid');
                        $('#stok').addClass('is-valid');
                    }
                }
                if (response.success) {
                    $('#my-modal').modal('hide')
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.success,
                    }).then((value) => {
                        $('#tabel').DataTable().ajax.reload();
                        Toast.fire({
                            icon: 'success',
                            title: response.success
                        })
                    })
                }
            },
            error: function(e) {
                alert('Error \n' + e.responseText);
            }
        });
        return false
    })


    $(document).ready(function() {
        $('#harga_beli').mask('000.000.000', {
            reverse: true
        });
        $('#harga_jual').mask('000.000.000', {
            reverse: true
        });
    })
</script>