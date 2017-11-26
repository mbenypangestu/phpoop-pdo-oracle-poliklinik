<h2 class="content-title">Edit Data Pasien</h2>
<a href=".?p=<?php echo $_GET['p']; ?>" class="btn btn-default pull-right btn-back">
    <i class="fa fa-arrow-left"></i> Kembali
</a>
<hr>
<div class="box dark">
    <header>
        <a href="#" class="icons btn-warning" id="btn-edit"><i class="fa fa-pencil-square-o"></i></a>
        <a href="#" class="icons btn-primary" id="btn-cancel" style="display: none"><i class="fa fa-undo"></i></a>

        <h5>Edit Data Pasien</h5>

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
        <form method="post" action="" class="form-horizontal">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nama Pasien (*)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="name" value="<?php echo $result['NAME'] ?>" placeholder="Input Nama Pasien ..." style="text-transform:capitalize" autocomplete="off" required readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Gender (*)</label>
                <div class="col-sm-7">
                    <select class="form-control" name="gender" required readonly>
                        <option value="L" <?php if ($result['GENDER'] == 'L') echo "selected"; ?>>Laki-laki</option>
                        <option value="P" <?php if ($result['GENDER'] == 'P') echo "selected"; ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Alamat (*)</label>
                <div class="col-sm-7">
                    <textarea class="form-control" name="address" placeholder="Alamat Pasien ..." style="text-transform:capitalize" autocomplete="off"  readonly><?php echo $result['ADDRESS'] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Tanggal Lahir (*)</label>
                <div class="col-sm-7">
                    <input type="date" class="form-control" name="birth_day" value="<?php echo date("Y-m-d", strtotime($result['BIRTH_DAY'])); ?>" placeholder="Tanggal lahir ..." style="text-transform:uppercase" autocomplete="off" readonly required>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Telepon</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="telp" value="<?php echo $result['TELP'] ?>" placeholder="Telepon Pasien ..." autocomplete="off" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Tanggal Registrasi</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="regis_date" value="<?php echo $result['REGIS_DATE'] ?>" placeholder="Telepon Pasien ..." autocomplete="off" readonly>
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
    $name       = $_POST['name'];
    $gender     = $_POST['gender'];
    $address    = $_POST['address'];
    $birth_day  = $_POST['birth_day'];
    $telp       = $_POST['telp'];
    $id         = $_GET['id'];

    $update     = $data->update($page, $id, ['name' => $name, 'gender' => $gender,
        'address' => $address, 'birth_day' => $birth_day, 'telp' => $telp]);
}
?>
