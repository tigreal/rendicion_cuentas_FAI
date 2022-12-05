<?php

// only personal data
var_dump($_POST["full_personal_data"]);
echo "<br/>";
// destino de fondos y importe
var_dump($_POST["detalle_rendicion"]);
echo "<br/>";
// datos: fecha_fact; factura_num; detalla_fact; monto_fact
var_dump($_POST["datePicker"]);
$factura_datos = $_POST["datePicker"];
echo "<br/>";
$tamanio = count($factura_datos);
echo "la dimencion del array es:" . $tamanio;
echo "<br/>";
$res = $tamanio / 4;
echo "tanio array:".$res;
echo "<br/>";
echo "<br/>";

$contador=0;

foreach ($factura_datos as $key) {

    echo $key;
    if ($res == $contador) {
        echo "<br/>";
        echo "<br/>";
        $contador=0;
    }
    $contador += $contador + 1;
}


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