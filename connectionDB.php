<?php

// php v. 8.1.6

<<<<<<< HEAD

$servareName = "DESKTOP-S4UV3CT";
$userId = "sa";
$pass = "admin12345";
$dbNeme = "formulario";
=======
define('DB_HOST', 'localhost');
define('DB_USER', 'sa');
define('DB_PASSWORD', 'admin12345');
define('DB_NAME', 'formulario');
define('DB_SERVER_NAME','DESKTOP-GPP6M5J\MSSQLSERVER2019');
>>>>>>> 6893ee698ce2896d8bd4b7b5e0bd0c46e9654039


$servareName = "DESKTOP-GPP6M5J\MSSQLSERVER2019";
$userId = "sa";
$pass = "admin12345";
$dbNeme = "formulario";

// SQL connection whit globales 
// remeber close of a double quotation marks .""
try {
<<<<<<< HEAD
    $conn = new PDO("sqlsrv:server=$servareName ; Database=formulario", "", "");
=======
    $conn = new PDO("sqlsrv:server=".DB_SERVER_NAME."; Database=".DB_NAME."", DB_USER, DB_PASSWORD);
>>>>>>> 6893ee698ce2896d8bd4b7b5e0bd0c46e9654039
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(print_r($e->getMessage()));
}

// SQL connection whitout globales
// try {
//     $conn = new PDO("sqlsrv:server=$servareName ; Database=$dbNeme", $userId, $pass);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (Exception $e) {
//     die(print_r($e->getMessage()));
// }

try {
    $tsql = "SELECT username   
 FROM register";
    foreach ($conn->query($tsql) as $row) {
        print_r($row);
    }
} catch (Exception $e) {
    die(print_r($e->getMessage()));
}
