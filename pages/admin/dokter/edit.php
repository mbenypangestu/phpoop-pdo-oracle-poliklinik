<h2 class="content-title">Edit Data Dokter</h2>
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
                <label for="name" class="col-sm-2 control-label">Nama Dokter (*)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="name" value="<?php echo $result['NAME'] ?>"  placeholder="Input Nama Dokter ..." style="text-transform:capitalize" autocomplete="off" required readonly>
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
                    <textarea class="form-control" name="address" placeholder="Alamat Dokter ..." style="text-transform:capitalize" autocomplete="off"  readonly><?php echo $result['ADDRESS'] ?>
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Tanggal Lahir (*)</label>
                <div class="col-sm-7">
                    <input type="date" class="form-control" name="birth_day" value="<?php echo date("Y-m-d", strtotime($result['BIRTH_DAY'])); ?>"  placeholder="Tanggal lahir ..." style="text-transform:uppercase" autocomplete="off" readonly required>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Telepon</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="telp" value="<?php echo $result['TELP'] ?>"  placeholder="Telepon Dokter ..." autocomplete="off" readonly>
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
    $gender     = $_POST['gender'];
    $address    = $_POST['address'];
    $birth_day  = $_POST['birth_day'];
    $telp       = $_POST['telp'];
    $id         = $_GET['id'];

    $update     = $data->update($page, $id, ['id_poli' => $id_poli, 'name' => $name, 'gender' => $gender,
        'address' => $address, 'birth_day' => $birth_day, 'telp' => $telp]);
}
?>