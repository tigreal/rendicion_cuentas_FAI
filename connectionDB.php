<?php

// php v. 8.1.6


$servareName = "DESKTOP-GPP6M5J";
$userId = "DESKTOP-GPP6M5J";
$pass = "komodoensis";
$dbNeme = "RendicionGasto";


try {
    $conn = new PDO("sqlsrv:server=$servareName ; Database=RendicionGasto", "", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die( print_r( $e->getMessage() ) );   
}

try  
{  
$tsql = "SELECT nombre   
 FROM personal"; 
 foreach ($conn->query($tsql) as $row ) {
    print_r($row);
 }
  
}  
catch(Exception $e)  
{   
die( print_r( $e->getMessage() ) );   
}  