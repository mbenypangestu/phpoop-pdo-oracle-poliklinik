<h2 class="content-title">Detail Rekam Medis</h2>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href=".?p=<?php echo $_GET['p']; ?>" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
        <a href=".?p=<?php echo $page; ?>&a=invoice&id=<?php echo $_GET['id']; ?>" class="btn btn-primary pull-right">Lihat Struk Detail</a>
    </div>

    <?php
        $result = $data->getByID($_GET['id']);
//        print_r($result);
    ?>

    <div class="panel-body">
        <div class="row attribute">
            <div class="col-sm-2">
                <label>Nama Pasien</label>
            </div>
            <div class="col-sm-10"><?php echo $result['NAMA_PASIEN'] ?></div>
        </div>
        <div class="row attribute">
            <div class="col-sm-2">
                <label>Poli Tujuan</label>
            </div>
            <div class="col-sm-10"><?php echo $result['NAMA_POLI'] ?></div>
        </div>
        <div class="row attribute">
            <div class="col-sm-2">
                <label>Dokter </label>
            </div>
            <div class="col-sm-10"><?php echo $result['NAMA_DOKTER'] ?></div>
        </div>
        <div class="row attribute">
            <div class="col-sm-2">
                <label>Tanggal Check in</label>
            </div>
            <div class="col-sm-10"><?php echo $result['DATE_TRANSACTION'] ?></div>
        </div>
        <div class="row attribute">
            <div class="col-sm-2">
                <label>Keluhan</label>
            </div>
            <div class="col-sm-10"><?php echo $result['COMPLAINT'] ?></div>
        </div>
        <div class="row attribute">
            <div class="col-sm-2">
                <label>Solusi</label>
            </div>
            <div class="col-sm-10"><?php echo $result['SOLUTION'] ?></div>
        </div>
        <div class="row attribute">
            <div class="col-sm-2">
                <label style="margin-top: 7px">Status Check Dokter</label>
            </div>
            <div class="col-sm-10">
                <?php if ($result['STATUS_CEK'] == 0) { ?>
                    <label class="btn btn-warning">Belum dicek</label>
                <?php } else { ?>
                    <label class="btn btn-success">Sudah dicek</label>
                <?php }  ?>
            </div>
        </div>
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
