<h2 class="content-title">Detail Rekam Medis</h2>
<a href=".?p=<?php echo $_GET['p']; ?>" class="btn btn-default pull-right btn-back">
    <i class="fa fa-arrow-left"></i> Kembali
</a>
<hr>

<?php
$result = $data->getByID($_GET['id']);
//        print_r($result);
?>

<div class="row">
    <div class="col-xs-6">
        <address>
            <strong>Pasien :</strong><br>
            <?php echo $result['NAMA_PASIEN'] ?><br>
        </address>
    </div>
    <div class="col-xs-6 text-right">
        <address>
            <strong>Petugas :</strong><br>
            <?php echo $_SESSION['username']; ?><br>
        </address>
    </div>
</div>
<div class="row">
    <div class="col-xs-6">
        <address>
            <strong>Dokter :</strong><br>
            <?php echo $result['NAMA_DOKTER'] ?><br>
        </address>
    </div>
    <div class="col-xs-6 text-right">
        <address>
            <strong>Tanggal Rekam medis :</strong><br>
            <?php echo $result['DATE_TRANSACTION'] ?><br>
        </address>
    </div>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="text-center"><strong>Detail Obat</strong></h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <td><strong></strong></td>
                    <td class="text-center"><strong>Harga</strong></td>
                    <td class="text-center"><strong>Qty</strong></td>
                    <td class="text-right"><strong>Total</strong></td>
                </tr>
                </thead>
                <tbody>
                <?php
                    $detail = $data->getDetailByID($result['ID']);
                    $poli = $data->getPoliByID($result['ID_POLI']);
                    for ($i = 0; $i < count($detail); $i++) {
                        $obat = $data->getObatByID($detail[$i]['ID_OBAT']);
                ?>
                        <tr>
                            <td><?php echo $obat['NAME'] ?></td>
                            <td class="text-center">Rp. 20000</td>
                            <td class="text-center"><?php echo $detail[$i]['QTY'] ?></td>
                            <td class="text-right"><?php echo $detail[$i]['QTY'] * $obat['PRICE'] ?></td>
                        </tr>
                <?php
                    }
                ?>
                <tr>
                    <td class="emptyrow"></td>
                    <td class="emptyrow"></td>
                    <td class="emptyrow text-center"><strong>Biaya Administrasi Poli</strong></td>
                    <td class="emptyrow text-right"><?php echo $poli['PRICE'] ?></td>
                </tr>
                <tr>
                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                    <td class="emptyrow"></td>
                    <td class="emptyrow text-center"><strong>Total</strong></td>
                    <td class="emptyrow text-right"><?php echo $result['TOTAL'] ?></td>
                </tr>
                </tbody>
            </table>
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
