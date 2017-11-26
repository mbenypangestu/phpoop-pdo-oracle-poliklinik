<form method="post" action="" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
<!--    <input type="hidden" name="url" value="{{ url('/admin/semester') }}">-->
<!--    <input type="hidden" name="url_add" value="{{ url('/admin/semester/add') }}">-->

    <div class="modal-body">
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Nama Dokter (*)</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="name" placeholder="Input Nama Dokter ..." style="text-transform:capitalize" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Poli (*)</label>
            <div class="col-sm-7">
                <select class="form-control" name="id_poli" required>
                    <option value=""selected disabled>-- Pilih Poli --</option>
                    <?php
                        $getPoli    = $data->getPoli();
                        if (count($getPoli) > 0) {
                            for ($i = 0; $i < count($getPoli); $i++) {
                    ?>

                                <option value="<?php echo $getPoli[$i]['ID'] ?>"><?php echo $getPoli[$i]['NAME'] ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Gender (*)</label>
            <div class="col-sm-7">
                <select class="form-control" name="gender" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Alamat (*)</label>
            <div class="col-sm-7">
                <textarea class="form-control" name="address" placeholder="Alamat Dokter ..." style="text-transform:capitalize" autocomplete="off" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Tanggal Lahir (*)</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="birth_day" placeholder="Tanggal lahir ..." style="text-transform:uppercase" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Telepon (*)</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="telp" placeholder="Telepon Dokter ..." autocomplete="off" required>
            </div>
        </div>

        <p>Keterangan (*) : Wajib Diisi</p>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default flat"><span class="glyphicon glyphicon-ban-circle"></span> Batal</button>
        <input type="submit" name="save" class="btn btn-primary pull-right flat add" onclick="" id="btn-simpan" value="Simpan">
    </div><!-- /.box-footer -->
</form>

<div class="overlay" id="loading6" style="display:none">
    <i class="fa fa-refresh fa-spin"></i>
</div>

<?php
if (isset($_POST['save'])) {
    $id_poli    = $_POST['id_poli'];
    $name       = $_POST['name'];
    $gender     = $_POST['gender'];
    $address    = $_POST['address'];
    $birth_day  = $_POST['birth_day'];
    $telp       = $_POST['telp'];
    $insert     = $data->create($page, ['id_poli' => $id_poli, 'name' => $name, 'gender' => $gender,
        'address' => $address, 'birth_day' => $birth_day, 'telp' => $telp]);
}
?>