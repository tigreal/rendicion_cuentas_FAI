<?php
session_start();
require_once dirname(__DIR__) . '/ArcoIrisRediCuentas/config/database.php';


class datosFormulario
{
  public $connect;
  public $row;
  public $declaracion;

  function __construct()
  {
    $info_conexion = array("Database" => DB_NAME, "UID" => DB_USER, "PWD" => DB_PASSWORD);

    $this->connect = sqlsrv_connect(
      DB_SERVER_NAME,
      $info_conexion
    );
    if (!$this->connect) {
      die(print_r(sqlsrv_errors(), true));
    }
    $this->error = array();



    try {


      $params = array();
      $query = "select number_form_temp,nombre,proyecto,numero_factura,detalle_descripcion_factura,monto_factura,total,importe,saldo,reintegro from temp_form_datos";
      // insert into temp_number_formulario values('PS-000','6134475')
      $options =  array("Scrollable" => SQLSRV_CURSOR_KEYSET);
      // only return false if a parameters are bad
      $declaracion = sqlsrv_prepare($this->connect, $query, $params, $options);
      $res = sqlsrv_execute($declaracion);
      $import = 0;
      $saldo = 0;
      $total = 0;
      $numeroForm = 0;
      // $this->row2 = sqlsrv_fetch_array($declaracion, SQLSRV_FETCH_ASSOC);
      // $numeroForm = $this->row["number_form_temp"];

      while ($this->row = sqlsrv_fetch_array($declaracion, SQLSRV_FETCH_ASSOC)) {


        echo $this->row["number_form_temp"] . " " . $this->row["nombre"] . " " . $this->row["proyecto"] . " " . $this->row["numero_factura"] . " " . $this->row["detalle_descripcion_factura"] . " " . $this->row["monto_factura"];

        if ($numeroForm != $this->row["number_form_temp"]) {
          echo "--IMPORTE " . $this->row["importe"] . "--";
          echo "--TOTAL " . $this->row["total"] . "--";
          echo "--SALDO " . $this->row["saldo"] . "--";
          echo "--REINTEGRO " . $this->row["reintegro"] . "--";
        } else {

          // if($bandera==1){
          //   echo "--".$this->row["total"]."--";
          //   $bandera=0;
          // }
          $numeroForm = $this->row["number_form_temp"];
          $total = $this->row["total"];
          $import = $this->row["importe"];
          $saldo = $this->row["saldo"];
          $saldo = $this->row["reintegro"];
        }
        $numeroForm = $this->row["number_form_temp"];

        echo "<br/>";
        //  echo ;
        //  echo $this->row["numero_factura"];
        //  echo $this->row["detalle_descripcion_factura"];
        //  echo $this->row["monto_factura"];
      }
      // foreach($row as $valor){
      //   echo $valor;
      //    echo $row['nombre'];
      // }
      // strftime("%Y-%m-%d", $fecha2022->getTimestamp());



      // var_dump("<br/><br/>se guardo: " . $res2);
    } catch (Exception $e) {
      echo "error" . $e->getMessage();
    }
  }
}
$objFormulario = new DatosFormulario();
// $objFormulario->row["number_form_temp"];
// var_dump($objFormulario->row);








?>
<!Doctype html>
<html>

<head>
  <title>La Funda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .navbar {
      border-radius: 0;
    }

    .heading {
      padding: 10px;
    }


    td:not(:empty) {
      border: 1px solid black;
    }
    th:not(:empty) {
      border: 1px solid black;
    }


    /* input {
      border-radius: 0px;
    } */
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Fundacion ArcoIris</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">

          <li class="active"><a href="#">Inicio</a></li>


        </ul>
        <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="#Register"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li> -->
          <li><a href="<?php echo URL . "/close_session.php"; ?>"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Body -->
  <div class="container"><br><br>

    <?php

    //     echo "
    // <table border='1'>
    // <tbody>
    // <tr>
    // <td>
    // Formulario N.-
    // </td>
    // </tr>
    // </tbody>
    // </table>";
    $params = array();
    $query = "select number_form_temp,nombre,proyecto,numero_factura,detalle_descripcion_factura,monto_factura,total,importe,saldo,reintegro from temp_form_datos";
    // insert into temp_number_formulario values('PS-000','6134475')
    $options =  array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    // only return false if a parameters are bad
    $declaracion = sqlsrv_prepare($objFormulario->connect, $query, $params, $options);
    $res = sqlsrv_execute($declaracion);
    $numeroForm = 0;
    while ($row = sqlsrv_fetch_array($declaracion, SQLSRV_FETCH_ASSOC)) {


      echo "
    <table  align='center'>
    ";
      if($row["number_form_temp"]!=$numeroForm){
   echo "<thead>
  <tr>
    <th>
      N.-
    </th>
    <th>
      Nombre
    </th>
    <th>
      Proyecto
    </th>
    <th>
      N.- Factura
    </th>
    <th>
      Detalle Factura
    </th>
    <th>
      Monto Factura
    </th>


  </tr>
  </thead>";
  }

  echo "<tbody>
  <tr>
  <td>
    {$row["number_form_temp"]}
  </td>
  <td>
    {$row["nombre"]}
  </td>
  <td>
    {$row["proyecto"]}
  </td>
  <td>
    {$row["numero_factura"]}
  </td>
  <td>
    {$row["detalle_descripcion_factura"]}
  </td>
  <td>
    {$row["monto_factura"]}
  </td>
  
  </tr>
  ";

      // . $row["number_form_temp"] . " " . $row["nombre"] . " " . $row["proyecto"] . " " . $row["numero_factura"] . " " . $row["detalle_descripcion_factura"] . " " . $row["monto_factura"]

      if ($numeroForm != $row["number_form_temp"]) {
        
        echo "<tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>TOTAL</td>
        <td>{$row["total"]}</td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>SALDO</td>
        <td>{$row["saldo"]}</td>
        </tr>
        </tbody>
        </table>";
        // echo "--IMPORTE " . $row["importe"] . "--";
        // echo "--TOTAL " . $row["total"] . "--";
        // echo "--SALDO " . $row["saldo"] . "--";
        // echo "--REINTEGRO " . $row["reintegro"] . "--";
      } else {

        
        $numeroForm = $row["number_form_temp"];
        $total = $row["total"];
        $import = $row["importe"];
        $saldo = $row["saldo"];
        $saldo = $row["reintegro"];


        
        
      }
      $numeroForm = $row["number_form_temp"];

     
    }


    ?>



  </div>

  <!-- Scripts -->
  <script type="text/javascript" src="js/login_validate.js"></script>
  <!-- <script type="text/javascript" src="js/register_validate.js"></script> -->
</body>


</html>