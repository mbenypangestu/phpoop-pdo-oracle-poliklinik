<h2 class="content-title">Edit Data Poli</h2>
<a href=".?p=<?php echo $_GET['p']; ?>" class="btn btn-default pull-right btn-back">
    <i class="fa fa-arrow-left"></i> Kembali
</a>
<hr>
<div class="box dark">
    <header>
        <a href="#" class="icons btn-warning" id="btn-edit"><i class="fa fa-pencil-square-o"></i></a>
        <a href="#" class="icons btn-primary" id="btn-cancel" style="display: none"><i class="fa fa-undo"></i></a>

        <h5>Edit Data Poli</h5>

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
?>
    <div id="div-1" class="accordion-body collapse in body">
        <form action="" method="post" class="form-horizontal">

            <div class="form-group">
                <label for="text1" class="control-label col-lg-2">Nama Poli (*)</label>

                <div class="col-lg-7">
                    <input type="text" id="name" name="name" value="<?php echo $result['NAME'] ?>" placeholder="Nama Poli ..." class="form-control" readonly required/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Deskripsi</label>

                <div class="col-lg-7">
                    <textarea readonly="" id="description" name="description" class="form-control" placeholder="Deskripsi ..."><?php echo $result['DESCRIPTION'] ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="text1" class="control-label col-lg-2"> Harga (*)</label>

                <div class="col-lg-7">
                    <input type="number" id="price" name="price" min="0" value="<?php echo $result['PRICE'] ?>" placeholder="Harga ..." class="form-control" readonly required/>
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
        $name       = $_POST['name'];
        $description= $_POST['description'];
        $price      = $_POST['price'];
        $id         = $_GET['id'];
        
        $update     = $data->update($page, $id, ['name' => $name, 'description' => $description, 'price' => $price]);
    }
?>