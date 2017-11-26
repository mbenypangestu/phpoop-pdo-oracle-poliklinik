<?php
    $user   = "beny";
    $pass   = "beny";
    $host   = "localhost:1512/XE";
    $conn   = oci_connect($user, $pass, $host);
    if (!$conn){
        $e = oci_error();
        echo "Error Connection : " . $e;
    } else{
        echo "Connection success";
    }
$s = oci_parse($conn, 'select * from poli');
oci_execute($s);
oci_fetch_all($s, $res);
echo "<pre>\n";
var_dump($res);
echo "</pre>\n";

//    $user   = "beny";
//    $pass   = "beny";
//    $host   = "
//    (DESCRIPTION =
//        (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1512))
//        (CONNECT_DATA =
//            (SERVER = DEDICATED)
//            (SERVICE_NAME = XE)
//        )
//    )";
//
//    try {
//        $conn   = new PDO("oci:dbname=" . $host, $user, $pass);
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "Connection success";
//    } catch (PDOException $e) {
//        echo "Error Connection : " . $e->getMessage();
//    }
//
//    include_once "../module/Crud.php";
//    $crud   = new Crud($conn);
?>
