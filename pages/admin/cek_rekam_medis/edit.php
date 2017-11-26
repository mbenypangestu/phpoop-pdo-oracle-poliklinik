<h2 class="content-title">Detail Rekam Medis</h2>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href=".?p=<?php echo $_GET['p']; ?>" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
        <a href=".?p=rekam_medis&a=invoice&id=<?php echo $_GET['id']; ?>" class="btn btn-primary pull-right">Lihat Struk Detail</a>
    </div>

    <?php
        $result = $data->getByID($_GET['id']);
//        print_r($result);
    ?>

    <div class="panel-body">
        <?php
        if (isset($_SESSION['message'])) {
            ?>
            <div class="alert alert-<?php echo $_SESSION['message']['status'] ?> alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $_SESSION['message']['text']; ?>.
            </div>

            <?php
            $_SESSION['message'] = null;
        }
        ?>
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
            <form method="post" action="">
                <div class="col-sm-5">
                    <textarea class="form-control" name="solution" placeholder="Solusi Pasien ..." style="text-transform:capitalize" autocomplete="off"></textarea>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="edit_solution" class="btn btn-primary" value="Simpan">
                </div>
            </form>

        </div>
        <div class="row attribute">
            <div class="col-sm-2">
                <label>Obat</label>
            </div>
            <div class="col-sm-10"></div>
        </div>
        <div class="row attribute">
            <form method="post" action="">
                <div class="col-sm-4">
                    <select class="form-control" name="id_obat" required>
                        <option value=""selected disabled>-- Pilih Obat --</option>
                        <?php
                        $getObat    = $data->getObat();
                        if (count($getObat) > 0) {
                            for ($i = 0; $i < count($getObat); $i++) {
                                ?>

                                <option value="<?php echo $getObat[$i]['ID'] ?>"><?php echo $getObat[$i]['NAME'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-1">
                    <input type="number" min="1" name="qty" class="form-control">
                </div>
                <div class="col-sm-3">
                    <input type="submit" name="save_obat" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="cek" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content box">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="">Input Rekam Medis</h4>
            </div>

            <?php include "pages/admin/$_GET[p]/_form_add.php"; ?>
        </div>
    </div>
</div>


<?php
if (isset($_POST['edit_solution'])) {
    echo "Test";
    $solution   = $_POST['solution'];
    $id         = $_GET['id'];

    $update     = $data->updateSolution($page, $id, ['solution' => $solution]);
} else if (isset($_POST['save_obat'])) {
    echo "Test";
    $id_obat     = $_POST['id_obat'];
    $qty         = $_POST['qty'];
    $id          = $_GET['id'];

    $update     = $data->addObat($page, $id, ['id_obat' => $id_obat, 'qty' => $qty]);
}
?>
