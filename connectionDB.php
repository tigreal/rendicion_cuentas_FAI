<?php
require_once("config/database.php");
// SQL connection whit globales 
// remeber close of a double quotation marks .""
try {
    $conn = new PDO("sqlsrv:server=".DB_SERVER_NAME."; Database=".DB_NAME."", DB_USER, DB_PASSWORD);
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
