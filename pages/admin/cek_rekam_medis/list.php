<h2>Rekam Medis</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
<!--        <button class="btn btn-primary" data-toggle="modal" data-target="#input">Tambah Rekam Medis</button>-->
    </div>
    <div class="panel-body">
        <div class="table-responsive">
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
            <table class="table table-striped table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Poli</th>
                    <th>Dokter</th>
                    <th>Status</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $result = $data->getAll();
                    //                    print_r($result);
                    $i = 1;
                    for ($x = 0; $x < count($result); $x++) {
                ?>
                        <tr class="odd gradeX">
                            <td class="col-md-1"><?php echo $i; ?></td>
                            <td><?php echo $result[$x]['NAMA_PASIEN']; ?></td>
                            <td><?php echo $result[$x]['NAMA_POLI']; ?></td>
                            <td><?php echo $result[$x]['NAMA_DOKTER']; ?></td>
                            <td>
                                <?php if ($result[$x]['STATUS_CEK'] == 0) { ?>
                                    <label class="btn btn-warning">Belum dicek</label>
                                <?php } else { ?>
                                    <label class="btn btn-success">Sudah dicek</label>
                                <?php }  ?>
                            </td>
                            <td class="center col-md-2">
                                <a href=".?p=<?php echo $page; ?>&a=edit&id=<?php echo $result[$x]['ID']; ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Cek keluhan</i>
                                </a>
                            </td>
                            <input type="hidden" name="url-delete<?php echo $i; ?>" id="url-delete<?php echo $i; ?>" value="?p=<?php echo $page; ?>&a=delete&id=<?php echo $result[$x]['ID']; ?>">
                        </tr>
                <?php
                        $i++;
                    }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="modal fade" id="input" role="dialog" aria-hidden="true">
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