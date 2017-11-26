<form method="post" action="" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
<!--    <input type="hidden" name="url" value="{{ url('/admin/semester') }}">-->
<!--    <input type="hidden" name="url_add" value="{{ url('/admin/semester/add') }}">-->

    <div class="modal-body">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Solusi (*)</label>
            <div class="col-sm-7">
                <textarea class="form-control" name="complaint" placeholder="Solusi Pasien ..." style="text-transform:capitalize" autocomplete="off"  ></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Obat (*)</label>
            <div class="col-sm-7">
                <select class="form-control" name="id_poli" required>
                    <option value=""selected disabled>-- Pilih Obat --</option>
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
                </select>            </div>
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

    $insert     = $data->create($page, ['id_pasien' => $id_poli, 'id_poli' => $id_poli, 'id_dokter' => $id_poli,
        'complaint' => $complaint]);
}
?>