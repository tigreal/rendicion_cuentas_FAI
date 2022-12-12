<?php
session_start();
require_once dirname(__DIR__) . '/ArcoIrisRediCuentas/config/database.php';


class datosFormulario
{
  public $connect;
  public $row;

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
      $query = "select nombre,number_form_temp,ci from temp_form_datos";
      // insert into temp_number_formulario values('PS-000','6134475')
      $options =  array("Scrollable" => SQLSRV_CURSOR_KEYSET);
      // only return false if a parameters are bad
      $declaracion = sqlsrv_prepare($this->connect, $query, $params, $options);
      $res = sqlsrv_execute($declaracion);
      $this->row=sqlsrv_fetch_array($declaracion, SQLSRV_FETCH_BOTH,SQLSRV_SCROLL_ABSOLUTE);

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
$objFormulario= new DatosFormulario();
$objFormulario->row["number_form_temp"];
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
echo "
<table border='1'>
<tbody>
<tr>
<td>
Formulario N.-".var_dump($objFormulario->row)."
</td>
</tr>
</tbody>
</table>";
// $objFormulario->row;

?>



  </div>

  <!-- Scripts -->
  <script type="text/javascript" src="js/login_validate.js"></script>
  <!-- <script type="text/javascript" src="js/register_validate.js"></script> -->
</body>


</html>