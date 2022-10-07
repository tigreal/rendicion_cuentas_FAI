<?php

// php v. 8.1.6


$servareName = "DESKTOP-S4UV3CT";
$userId = "sa";
$pass = "admin12345";
$dbNeme = "formulario";


try {
    $conn = new PDO("sqlsrv:server=$servareName ; Database=formulario", "", "");
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