<form class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
<!--    <input type="hidden" name="url" value="{{ url('/admin/semester') }}">-->
<!--    <input type="hidden" name="url_add" value="{{ url('/admin/semester/add') }}">-->

    <div class="modal-body">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nama Pasien (*)</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="name" placeholder="Input Nama Pasien ..." style="text-transform:capitalize" autocomplete="off" required >
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Gender (*)</label>
            <div class="col-sm-7">
                <select class="form-control" name="gender" required >
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Alamat (*)</label>
            <div class="col-sm-7">
                <textarea class="form-control" name="address" placeholder="Alamat Pasien ..." style="text-transform:capitalize" autocomplete="off"  ></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Tanggal Lahir (*)</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="birth_day" placeholder="Tanggal lahir ..." style="text-transform:uppercase" autocomplete="off"  required>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Telepon</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="telp" placeholder="Telepon Pasien ..." autocomplete="off" >
            </div>
        </div>

        <p>Keterangan (*) : Wajib Diisi</p>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default flat"><span class="glyphicon glyphicon-ban-circle"></span> Batal</button>
        <button type="submit" class="btn btn-primary pull-right flat add" onclick="" data-dismiss="modal" id="btn-simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
    </div><!-- /.box-footer -->
</form>

<div class="overlay" id="loading6" style="display:none">
    <i class="fa fa-refresh fa-spin"></i>
</div>