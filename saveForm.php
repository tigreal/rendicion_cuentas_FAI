<?php
require_once dirname(__DIR__) . '/ArcoIrisRediCuentas/config/database.php';

$erro;
$connect;
$info_conexion = array("Database" => DB_NAME, "UID" => DB_USER, "PWD" => DB_PASSWORD);
// $this->flag = 0;
$connect = sqlsrv_connect(
    DB_SERVER_NAME,
    $info_conexion
);
if (!$connect) {
    die(print_r(sqlsrv_errors(), true));
}

echo "<br/>";
// only personal data
var_dump($_POST["full_personal_data"]);
echo "<br/>";
$totales=$_POST["totales"];
$detalle_rendicion=$_POST["detalle_rendicion"];
var_dump($_POST["ci_ps"]);
$ci_ps=$_POST["ci_ps"];
// datos: fecha_fact; factura_num; detalla_fact; monto_fact
var_dump($_POST["datePicker"]);
$factura_datos = $_POST["datePicker"];
$trozos = array_chunk($factura_datos, 4);
$personalData=$_POST["full_personal_data"];
$resultado=true;
foreach ($trozos as $row) {
    $sql = "insert into temp_form_datos(total,saldo,reintegro,importe,destinoFondos,ci,PS_field,number_form_temp,nombre,fecha,area,proyecto,fecha_factura,numero_factura,detalle_descripcion_factura,monto_factura) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    if (!empty($row[0]) && !empty($row[1]) && !empty($row[2]) && !empty($row[3])) {
        $params = array($totales[0],$totales[1],$totales[2],$detalle_rendicion[0],$detalle_rendicion[1],$ci_ps[0],$ci_ps[1],$personalData[0],$personalData[1],$personalData[2],$personalData[3],$personalData[4],$row[0],$row[1],$row[2],floatval($row[3]));
        $resultado = sqlsrv_query($connect, $sql, $params);
    }
    if ($resultado === false) {
        die(print_r(sqlsrv_errors(), true));
    }
}
// echo "<br/>";
// print_r($trozos);

// destino de fondos y importe
var_dump($_POST["detalle_rendicion"]);

echo "<br/>";


// total, reintegro, saldo a depositar
var_dump($_POST["totales"]);






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Sus datos estan guardados</h1>
</body>

</html>