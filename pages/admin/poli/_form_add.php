<form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" method="post" action="">
<!--    <input type="hidden" name="url" value="{{ url('/admin/semester') }}">-->
<!--    <input type="hidden" name="url_add" value="{{ url('/admin/semester/add') }}">-->

    <div class="modal-body">
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Nama Poli (*)</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="name" placeholder="Input Nama Poli ..." style="text-transform:capitalize" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Deskripsi</label>
            <div class="col-sm-7">
                <textarea class="form-control" name="description" placeholder="Deskripsi Poli ..." style="text-transform:capitalize" autocomplete="off" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Harga Check up (*)</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" name="price" min="0" placeholder="Harga Check up Poli ..." style="text-transform:capitalize" autocomplete="off" required>
            </div>
            <span class="col-sm-2" style="margin: 5px -15px"><b>Rupiah</b></span>
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
        $name       = $_POST['name'];
        $description= $_POST['description'];
        $price      = $_POST['price'];
        $insert     = $data->create($page, ['name' => $name, 'description' => $description, 'price' => $price]);
    }
?>