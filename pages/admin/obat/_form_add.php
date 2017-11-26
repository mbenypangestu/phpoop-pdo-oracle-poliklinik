<form method="post" action="" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
<!--    <input type="hidden" name="url" value="{{ url('/admin/semester') }}">-->
<!--    <input type="hidden" name="url_add" value="{{ url('/admin/semester/add') }}">-->

    <div class="modal-body">

        <div class="form-group">
            <label for="text1" class="control-label col-lg-3">Nama Obat (*)</label>

            <div class="col-lg-7">
                <input type="text" id="name" name="name" placeholder="Nama Obat ..." class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">Deskripsi</label>

            <div class="col-lg-7">
                <textarea id="description" name="description" class="form-control" placeholder="Deskripsi ..."></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="text1" class="control-label col-lg-3"> Harga (*)</label>

            <div class="col-lg-7">
                <input type="number" id="price" min="0" name="price" placeholder="Harga ..." class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="text1" class="control-label col-lg-3"> Stok (*)</label>

            <div class="col-lg-7">
                <input type="number" id="stok" min="0" name="stock" placeholder="Stok ..." class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="text1" class="control-label col-lg-3"> Satuan (*)</label>

            <div class="col-lg-7">
                <input type="text" id="unit" name="unit" placeholder="Satuan ..." class="form-control" />
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
    $price      = $_POST['price'];
    $description= $_POST['description'];
    $stock      = $_POST['stock'];
    $unit       = $_POST['unit'];

    $insert     = $data->create($page, ['id_poli' => $id_poli, 'name' => $name, 'price' => $price,
        'description' => $description, 'stock' => $stock, 'unit' => $unit]);
}
?>