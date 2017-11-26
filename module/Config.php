<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/07/17
 * Time: 13:52
 */
class Config
{
    public $conn;

    public function __construct() {
        
    }

    public function dbConnect() {
        try {
            $conn       = new PDO("oci:dbname=" . $this->host, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn = $conn;

//            echo "Connection success";
        } catch (PDOException $e) {
            echo "Error Connection : " . $e->getMessage();
        }
    }
}