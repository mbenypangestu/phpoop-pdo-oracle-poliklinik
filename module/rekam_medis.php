<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/07/17
 * Time: 13:23
 */
class rekam_medis
{
    private $user   = "beny";
    private $pass   = "beny";
    private $host   = "
    (DESCRIPTION =
        (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1512))
        (CONNECT_DATA =
            (SERVER = DEDICATED)
            (SERVICE_NAME = XE)
        )
    )";
    public $conn;
    public $isConnect   = false;
    public $table       = 'medical_record';
    public $text;
    public $status;
    public $message     = [];

    public function __construct() {
        $this->dbConnect();
    }

    public function dbConnect() {
        try {
            $conn       = new PDO("oci:dbname=" . $this->host, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn = $conn;
            $this->isConnect = true;

//            echo "Connection success";
        } catch (PDOException $e) {
            echo "Error Connection : " . $e->getMessage();
        }
    }

    public function dbDisconnect() {
        $this->conn         = null;
        $this->isConnect    = false;
    }

    public function getAll($params = []) {
        try {
            $sql    = "select a.*, b.name as nama_poli, c.name as nama_pasien, d.name  as nama_dokter from $this->table a, poli b, pasien c, dokter d 
                      WHERE a.id_poli = b.id and a.id_pasien = c.id and a.id_dokter = d.id ORDER BY a.id ASC";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getByID($id, $params = []) {
        try {
            $sql    = "select a.*, b.name nama_poli, c.name nama_pasien, d.name nama_dokter 
                      from $this->table a, poli b, pasien c, dokter d 
                      WHERE a.id_poli = b.id and a.id_pasien = c.id and a.id_dokter = d.id  and a.id = $id";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getDetailByID($id, $params = []) {
        try {
            $sql    = "select * from detail_medical_record where ID_MEDICAL_RECORD = $id";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getPoli($params = []) {
        try {
            $sql    = "select * from poli ORDER BY ID ASC";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getPoliByID($id, $params = []) {
        try {
            $sql    = "select * from poli where ID = $id";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getObatByID($id, $params = []) {
        try {
            $sql    = "select * from obat where ID = $id";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getPasien($params = []) {
        try {
            $sql    = "select * from pasien ORDER BY ID ASC";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getDokter($params = []) {
        try {
            $sql    = "select * from dokter ORDER BY ID ASC";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function create($page, $params = []) {
        try {
            $getID  = $this->conn->prepare("select * from (select * from $this->table ORDER BY id DESC) WHERE ROWNUM = 1");
            $getID->execute();
            $resultGetID = $getID->fetch(PDO::FETCH_ASSOC);

            if ($resultGetID['ID'] > 0)
                $id = $resultGetID['ID'] + 1;
            else
                $id = 1;

            $now    = date('d/M/Y');
            print_r($params);

            $status_cek = 0;
            $total      = 0;
            $poli       = $this->getPoliByID($params['id_poli']);
            $harga_poli = $poli['PRICE'];
            $total      += $harga_poli;
            echo $total;
            $sql    = "INSERT INTO $this->table (ID, ID_PASIEN, ID_POLI, ID_DOKTER, DATE_TRANSACTION, TOTAL, COMPLAINT, SOLUTION, STATUS_CEK) VALUES
                      ($id, $params[id_pasien], $params[id_poli], $params[id_dokter], '$now', $total, '$params[complaint]', ' ', $status_cek)";
            $query  = $this->conn->prepare($sql);
            $query->execute();

            $this->text             = "Data berhasil disimpan";
            $this->status           = "success";
            $this->message          = [
                'text'      => $this->text,
                'status'    => $this->status
            ];
            $_SESSION['message']    = $this->message;
            echo "<script>location  ='?p=$page';</script>";
        } catch (PDOException $e) {
            echo "Error : ". $e->getMessage();
        }
    }

    public function update($page, $id, $params = []) {
        try {
            $birthday = date('d/M/Y', strtotime($params['birth_day']));

            try {
                $sql = "UPDATE $this->table set ID_POLI = $params[id_poli], NAME = '$params[name]', 
                    GENDER = '$params[gender]', ADDRESS = '$params[address]', BIRTH_DAY = '$birthday',
                    TELP = '$params[telp]' 
                    WHERE ID = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $this->text             = "Data berhasil diubah";
            $this->status           = "info";
            $this->message          = [
                'text'      => $this->text,
                'status'    => $this->status
            ];
            $_SESSION['message']    = $this->message;
            echo "<script>location='?p=$page';</script>";
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function delete($page, $id) {
        try {
            $sql    = "DELETE FROM $this->table WHERE ID = $id";
            $query  = $this->conn->prepare($sql);
            $query->execute();

            $this->text             = "Data berhasil dihapus";
            $this->status           = "info";
            $this->message          = [
                'text'      => $this->text,
                'status'    => $this->status
            ];
            $_SESSION['message']    = $this->message;
            echo "<script>location='?p=$page';</script>";
        } catch (PDOException $e) {
            echo "Error : ". $e->getMessage();
        }
    }
}