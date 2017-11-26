<form method="post" action="" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
<!--    <input type="hidden" name="url" value="{{ url('/admin/semester') }}">-->
<!--    <input type="hidden" name="url_add" value="{{ url('/admin/semester/add') }}">-->

    <div class="modal-body">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Pasien (*)</label>
            <div class="col-sm-7">
                <select class="form-control" name="id_pasien" required>
                    <option selected disabled>-- Pilih Pasien --</option>
                    <?php
                    $getPasien    = $data->getPasien();
                    if (count($getPasien) > 0) {
                        for ($i = 0; $i < count($getPasien); $i++) {
                            ?>

                            <option value="<?php echo $getPasien[$i]['ID'] ?>"><?php echo $getPasien[$i]['NAME'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Poli (*)</label>
            <div class="col-sm-7">
                <select class="form-control" name="id_poli" required>
                    <option selected disabled>-- Pilih Poli --</option>
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
            <label for="name" class="col-sm-2 control-label">Dokter (*)</label>
            <div class="col-sm-7">
                <select class="form-control" name="id_dokter" required>
                    <option value=""selected disabled>-- Pilih Dokter --</option>
                    <?php
                    $getDokter    = $data->getDokter();
                    if (count($getDokter) > 0) {
                        for ($i = 0; $i < count($getDokter); $i++) {
                            ?>

                            <option value="<?php echo $getDokter[$i]['ID'] ?>"><?php echo $getDokter[$i]['NAME'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Keluhan (*)</label>
            <div class="col-sm-7">
                <textarea class="form-control" name="complaint" placeholder="Keluhan Pasien ..." style="text-transform:capitalize" autocomplete="off"  ></textarea>
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
    $id_pasien  = $_POST['id_pasien'];
    $id_poli    = $_POST['id_poli'];
    $id_dokter  = $_POST['id_dokter'];
    $complaint  = $_POST['complaint'];
//    echo "<script>alert($id_pasien);</script>script>";

    $insert     = $data->create($page, ['id_pasien' => $id_pasien, 'id_poli' => $id_poli, 'id_dokter' => $id_dokter,
        'complaint' => $complaint]);
    
}
?>