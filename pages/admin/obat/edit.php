<h2 class="content-title">Edit Data Obat</h2>
<a href=".?p=<?php echo $_GET['p']; ?>" class="btn btn-default pull-right btn-back">
    <i class="fa fa-arrow-left"></i> Kembali
</a>
<hr>
<div class="box dark">
    <header>
        <a href="#" class="icons btn-warning" id="btn-edit"><i class="fa fa-pencil-square-o"></i></a>
        <a href="#" class="icons btn-primary" id="btn-cancel" style="display: none"><i class="fa fa-undo"></i></a>

        <h5>Edit Data Obat</h5>

        <div class="toolbar">
            <ul class="nav">
                <li class="">
                    <a class="accordion-toggle minimize-box" data-toggle="collapse" href="#div-1">
                        <i class="fa fa-minus"></i>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <?php
        $result = $data->getByID($_GET['id']);
//        print_r($result);
    ?>

    <div id="div-1" class="accordion-body collapse in body">
        <form method="post" action="" class="form-horizontal">

            <div class="form-group">
                <label for="text1" class="control-label col-lg-2">Nama Obat (*)</label>

                <div class="col-lg-7">
                    <input type="text" id="name" name="name" value="<?php echo $result['NAME'] ?>" placeholder="Nama Obat ..." class="form-control" readonly/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Deskripsi</label>

                <div class="col-lg-7">
                    <textarea readonly="" id="description" name="description" class="form-control" placeholder="Deskripsi ..."><?php echo $result['DESCRIPTION']; ?>
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="text1" class="control-label col-lg-2"> Harga (*)</label>

                <div class="col-lg-7">
                    <input type="number" id="price" min="0" name="price" value="<?php echo $result['PRICE'] ?>" placeholder="Harga ..." class="form-control" readonly/>
                </div>
            </div>
            <div class="form-group">
                <label for="text1" class="control-label col-lg-2"> Stok (*)</label>

                <div class="col-lg-7">
                    <input type="number" id="stok" min="0" name="stock" value="<?php echo $result['STOCK'] ?>" placeholder="Stok ..." class="form-control" readonly/>
                </div>
            </div>
            <div class="form-group">
                <label for="text1" class="control-label col-lg-2"> Satuan (*)</label>

                <div class="col-lg-7">
                    <input type="text" id="unit" name="unit" value="<?php echo $result['UNIT'] ?>" placeholder="Satuan ..." class="form-control" readonly/>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Poli (*)</label>
                <div class="col-sm-7">
                    <select class="form-control" name="id_poli" required readonly="">
                        <option value=""selected disabled>-- Pilih Poli --</option>
                        <?php
                        $getPoli    = $data->getPoli();
                        if (count($getPoli) > 0) {
                            for ($i = 0; $i < count($getPoli); $i++) {
                                ?>

                                <option value="<?php echo $getPoli[$i]['ID']; ?>"
                                    <?php if ($getPoli[$i]['ID'] == $result['ID']) echo "selected"; ?>>
                                    <?php echo $getPoli[$i]['NAME'] ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-push-2 col-lg-7">
                    <input type="submit" id="btn-save" name="edit" value="Simpan" class="btn btn-primary" disabled/>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['edit'])) {
    echo "Test";
    $id_poli    = $_POST['id_poli'];
    $name       = $_POST['name'];
    $price      = $_POST['price'];
    $description= $_POST['description'];
    $stock      = $_POST['stock'];
    $unit       = $_POST['unit'];
    $id         = $_GET['id'];

    $update     = $data->update($page, $id, ['id_poli' => $id_poli, 'name' => $name, 'price' => $price,
        'description' => $description, 'stock' => $stock, 'unit' => $unit]);
}
?>