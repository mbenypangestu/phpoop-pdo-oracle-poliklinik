<?php

function die_r($value) {
    echo '<pre>';

    print_r($value);

    echo '</pre>';
    die();
}

include_once "module/poli.php";
$poli   = new poli();

//$query  = $poli->conn->prepare("delete from poli where id = 2");
//$query->execute();

$sql    = "delete from poli where id = 5";
$query  = $poli->conn->prepare($sql);
try{
    $res = $query->execute();
} catch (PDOException $e) {
    print_r('Error occured while trying to insert into the DB:' . $e->getMessage(), E_USER_ERROR);
}

//$user   = "beny";
//$pass   = "beny";
//$host   = "localhost:1512/XE";
//$conn   = oci_connect($user, $pass, $host);
//if (!$conn){
//    $e = oci_error();
//    echo "Error Connection : " . $e;
//} else{
//    echo "Connection success";
//}
//
//$sql    = "INSERT INTO poli (ID, NAME, DESCRIPTION, PRICE) VALUES (1, 'test6', 'Test16', 1)";
//$query  = oci_parse($conn, $sql);
//$res = oci_execute($query);
if (!$res)
    echo "query failed";
else
    echo "query sukses";

//die_r($result);