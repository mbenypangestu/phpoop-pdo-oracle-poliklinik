<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/07/17
 * Time: 13:23
 */
class poli
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
    public $table       = 'poli';
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
            $sql    = "select * from $this->table ORDER BY ID ASC";
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
            $sql    = "select * from $this->table where ID = $id";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

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

            if ($params['description'] == null)
                $params['description']  = '-';

            $sql    = "INSERT INTO $this->table (ID, NAME, DESCRIPTION, PRICE) VALUES ($id, '$params[name]', '$params[description]', $params[price])";
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
            if ($params['description'] == null)
                $params['description']  = '-';

            $sql = "UPDATE $this->table set NAME = '$params[name]', DESCRIPTION = '$params[description]', PRICE = $params[price]
                      WHERE ID = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();

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