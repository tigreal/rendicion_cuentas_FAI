<?php
session_start();
// echo dirname(__DIR__);
require_once dirname(__DIR__) . '/ArcoIrisRediCuentas/config/database.php';

class datosFormulario
{
  protected $erro;
  public $connect;
  public $connect2;
  protected $loginID;
  public $row;
  public $row2;
  function __construct()
  {
    $info_conexion = array("Database" => DB_NAME2, "UID" => DB_USER, "PWD" => DB_PASSWORD);
    // $this->flag = 0;
    $this->connect = sqlsrv_connect(
      DB_SERVER_NAME,
      $info_conexion
    );
    if (!$this->connect) {
      die(print_r(sqlsrv_errors(), true));
    }
    $this->error = array();

    // coneccion db1
    $info_conexion2 = array("Database" => DB_NAME, "UID" => DB_USER, "PWD" => DB_PASSWORD);
    // $this->flag = 0;
    $this->connect2 = sqlsrv_connect(
      DB_SERVER_NAME,
      $info_conexion2
    );
    if (!$this->connect2) {
      die(print_r(sqlsrv_errors(), true));
    }
    $this->error = array();
    // coneccion db1 fin

    try {

      $this->setDatos($_SESSION["ci"]);
      $params2 = array();
      $query2 = "insert into temp_number_formulario values('" . $this->row['U_proyecto'] . "','" . $_SESSION["ci"] . "')";
      // insert into temp_number_formulario values('PS-000','6134475')
      $options2 =  array("Scrollable" => SQLSRV_CURSOR_KEYSET);
      // only return false if a parameters are bad
      $declaracion2 = sqlsrv_prepare($this->connect2, $query2, $params2, $options2);
      $res2 = sqlsrv_execute($declaracion2);
      var_dump("<br/><br/>se guardo: " . $res2);
    } catch (Exception $e) {
      echo "error" . $e->getMessage();
    }
  }
  public function setDatos($loginID)
  {
    // $loginID
    // " .  . "
    $params = array();
    $query = "select firstName,lastName,U_ApMaterno,PrjName,jobTitle,U_proyecto from OHEM join OPRJ on OHEM.U_proyecto = OPRJ.PrjCode
    where govID='" . $loginID . "'";
    $options =  array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    // only return false if a parameters are bad
    $declaracion = sqlsrv_prepare($this->connect, $query, $params, $options);
    $res = sqlsrv_execute($declaracion);
    // $num_rows = sqlsrv_num_rows($declaracion);
    var_dump($res);
    var_dump($declaracion);

    if ($res && $declaracion) {

      $this->row = sqlsrv_fetch_array($declaracion, SQLSRV_FETCH_ASSOC);
      var_dump($this->row);
    }
  }
  public function getNumeroFormulario()
  {
    // $loginID
    // " .  . "
    $params3 = array();
    $query3 = "select top 1 * from temp_number_formulario where ci ='" . $_SESSION["ci"] . "' order by numero_formulario_temp desc";
    $options3 =  array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    // only return false if a parameters are bad
    $declaracion3 = sqlsrv_prepare($this->connect2, $query3, $params3, $options3);
    $res3 = sqlsrv_execute($declaracion3);
    // $num_rows = sqlsrv_num_rows($declaracion);
    // var_dump($res3);
    // var_dump($declaracion);

    if ($res3 && $declaracion3) {
      // echo "entro";
      $this->row3 = sqlsrv_fetch_array($declaracion3, SQLSRV_FETCH_ASSOC);
      // var_dump($this->row3);
    }
  }
}
$loginID = $_SESSION["ci"];
echo $loginID;
$ejmDatosForm = new datosFormulario();
$ejmDatosForm->setDatos($loginID);






?>
<!DOCTYPE html>
<html>

<head>
  <!-- Import Pure CSS -->
  <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" />
  <!-- timePicker css file -->
  <link rel="stylesheet" href="css/dtsel.css" />

  <!-- Used to optimized Website for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <script src="static/js/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- css reposive  configuration -->
  <style>
    .container {
      margin-top: 20px;
      display: grid;
      grid-template-columns: auto;
      padding: 1rem 2rem;
      /* align-items: center; */
      /* justify-content: center; */
      /* flex-direction: column; */
    }

    .titulo {

      display: grid;
      grid-template-rows: auto;

      align-items: center;
      justify-content: center;
      /* flex-direction: column; */
    }


    h1 {
      color: green;
    }
  </style>

</head>

<body>




  <div class="container">
  <form name="formulario_rendi" action="saveForm.php" method="POST">
    <div>
      <label for="NumeroDocumet">
        <h3 id=docNumber>Documento Nº:<?php $ejmDatosForm->getNumeroFormulario();
                                      echo $ejmDatosForm->row3["numero_formulario_temp"]; ?></h3>
      </label>
    </div>

    <div class="titulo">
      <h1>RENDICIÓN DE CUENTAS</h1>

    </div>
    <div class="titulo">
      <h2>Coordinadores</h2>
    </div>
    
      <div class="container-informacion">

        <table border="1" id="table_main">
          <tbody>
            <tr>
              <td>
                <label for="lbl_nombre">nombre:</label>
                <input type="text" id="full_name" value="<?php echo $ejmDatosForm->row["firstName"] . " " . $ejmDatosForm->row["lastName"] . " " . $ejmDatosForm->row["U_ApMaterno"]; ?>">
              </td>

              <td>
                <label for="lbl_date">
                  fecha:
                </label>
                <i id="fecha"> </i>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">area:</label>
                <input type="text" value="<?php echo $ejmDatosForm->row["jobTitle"] ?>">
              </td>
              <td>
                <label for="">Unidad:</label>
                <input type="text">
              </td>
              <td>
                <label for="">Proyecto:</label>
                <input type="text" value="<?php echo $ejmDatosForm->row["PrjName"] ?>">
              </td>
            </tr>
            <tr>
              <td>importe recivido con </td>
              <td>
                <label for="">cheque:</label>
                <input type="text">
              </td>
              <td>
                <label for="">Efectivo:</label>
                <input type="text">
              </td>
              <td>
                <label for="">Importe:</label>
                <input type="text" class="txtimporte" id="txtimporte" name="txtimporte">
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Destino de fondos:</label>
              </td>
              <td>
                <input type="text">
              </td>
            </tr>

          </tbody>
        </table>

      </div>



      <!-- field to add values how fecha factura detalle monto -->
      <!-- Here pure-table class is used -->
      <table class="detail-table" border="1">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Factura</th>
            <th>Detalle</th>
            <th>Monto</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody class="cuerpo-detalle">
          <tr class="detail-row">
            <td>
              <!-- datePicker campo -->
              <input name="datePicker" class="form-control" type="text" id="field_date_1" />
            </td>
            <td>
              <input name="factura_number[]" type="text" class="form-control" id="field_bill_1" />
            </td>
            <td>
              <input name="detalle_factura[]" type="text" class="form-control" id="field_bill_detalle_1" />
            </td>
            <td>
              <input name="monto_factura[]" type="number" class="form-control monto_row_fai" id="field_monto_1" />
            </td>
            <td>
              <input name="btn-agregar" type="button" value="Agregar" />
            </td>
            <td>
              <input name="btn-eliminar" type="button" value="Eliminar" disabled />
            </td>
          </tr>

        </tbody>


      </table>
      <!-- <table class="pure-table">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Factura</th>
          <th>Detalle</th>
          <th>Monto</th>
          <th>Accion</th>

        </tr>
      </thead>

      <tbody>
        <tr>
          <td>1</td>
          <td>Rohit</td>
          <td>10000</td>
          <td>29</td>

        </tr>

        <tr>
          <td>2</td>
          <td>Virat</td>
          <td>12000</td>
          <td>40</td>

        </tr>

        <tr>
          <td>3</td>
          <td>Rahul</td>
          <td>5000</td>
          <td>8</td>

        </tr>

        <tr>
          <td>4</td>
          <td>Rishabh</td>
          <td>4000</td>
          <td>2</td>

        </tr>
      </tbody>
    </table> -->
      <div class="">

        <table class="footer-total" border="1">
          <!-- <thead>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead> -->
          <tbody>



            <tr>
              <!-- <td></td>
              <td></td> -->
              <td>Total</td>
              <td><input class="subtotal" type='text' id='subtotal' name='subtotal' readonly /></td>
            </tr>
            <tr>
              <td>Saldo a depositar</td>
              <td><input class="return-money" type='text' id='return-money' name='return-money' readonly /></td>
            </tr>
            <tr>
              <td>Reintegro</td>
              <td><input class="reintegro" type='text' id='reintegro' name='reintegro' readonly /></td>
            </tr>
          </tbody>
        </table>
        
        

      </div>
      <input type="submit" value="Enviar">
      </form>
  </div>
 
  <!-- javascript configuracion of the TimePicker -->
  <script src="js/dtsel.js"></script>
  <script>
    instance = new dtsel.DTS('input[name="datePicker"]', {
      direction: "BOTTOM",
    });
    // instance = new dtsel.DTS('input[name="dateTimePicker"]', {
    //   direction: "BOTTOM",
    //   dateFormat: "yyyy-mm-dd",
    //   showTime: true,
    //   timeFormat: "HH:MM:SS",
    // });
    // instance = new dtsel.DTS('input[name="timePicker"]', {
    //   direction: "BOTTOM",
    //   showTime: true,
    //   showDate: false,
    // });
  </script>

  <script>
    // document.getElementById("docNumber").innerHTML += Math.floor(Math.random() * 10);
    // document.getElementById("fecha").innerHTML += Date();
  </script>
  <!-- method clone this metodo permite introducir las new rows -->
  <script>
    $(document).ready(function() {
      $('body').on("click", "input[name='btn-agregar']", function(e) {
        // console.log(e.target.nodeName);
        var numerillo = $(e.target).closest(".cuerpo-detalle").find(".detail-row").length + 1;
        // console.log("index:"+numerillo);
        var cloned_el = $(e.target).closest(".detail-row").clone(true);
        $(e.target).closest(".cuerpo-detalle").last().append(cloned_el).find("input[name='btn-eliminar']:not(:first)").prop("disabled", false);
        // (cloned_el).find("input[name='btn-agregar']:not(:first)").prop("disabled");
        $("input[name='btn-agregar']:not(:first)").prop({
          "disabled": true
        });
        console.log("boton estado:" + $("input[name='btn-agregar']").prop("disabled"));
        // para limpiar los fields del agregar
        $(e.target).closest(".detail-row").find('td').find("input").not(":button, :submit").val("");
        // put index 
        $(e.target).closest(".cuerpo-detalle").find(".detail-row").last().find("input[name='datePicker']").attr("id", "field_date_" + numerillo);

        $(e.target).closest(".cuerpo-detalle").find(".detail-row").last().find("input[name='factura_number[]']").attr("id", "field_bill_" + numerillo);

        $(e.target).closest(".cuerpo-detalle").find(".detail-row").last().find("input[name='detalle_factura[]']").attr("id", "field_bill_detalle_" + numerillo);

        $(e.target).closest(".cuerpo-detalle").find(".detail-row").last().find("input[name='monto_factura[]']").attr("id", "field_monto_" + numerillo);



      });

    });
    // boton delete para deletar el row
    $("body").on("click", "input[name='btn-eliminar']", function() {
      $(this).closest(".detail-row").remove();
      // this event makes a refresh to result
      $(".monto_row_fai").first().val("0").trigger("input");

    });
    // calcular el monto total or calculate tha total amount
    $("body").on("input", "input.monto_row_fai", function() {
      // .on("input", "input.monto_row_fai", function()
      var total = 0;

      $(".monto_row_fai").each(function() {

        monto = $(this).val()
        if (isNaN(parseInt(monto))) {

          total += 0;
        } else {

          total += parseFloat($(this).val());
        }



      });
      $(".subtotal").val(total.toFixed(2));
      calcularReturnMoney();
      returnMyMomey();

      console.log("total$$: " + total.toFixed(2));

    });

    // retun money
    $("body").on("input", "input.txtimporte", function() {
      amount = parseInt($(this).val());
      console.log("importe: " + amount);
      if (isNaN(parseInt(amount))) {

      } else if (amount < 0) {
        // $(this).val("0");
      } else {
        calcularReturnMoney(amount);
        returnMyMomey();

      }
    });

    function calcularReturnMoney() {
      importe = $(".txtimporte").val();
      subtotal = $(".subtotal").val();
      console.log("importe isnan:" + parseInt(importe));
      // console.log("importe: " + importe + "total:" + subtotal);
      if (!isNaN(parseInt(importe))) {
        if (parseInt(importe) <= parseInt(subtotal)) {
          $(".return-money").val("0");

        } else {
          totalreturn = importe - subtotal;
          $(".return-money").val(totalreturn.toFixed(2));
          console.log("retunmoney:" + totalreturn);

        }
      }

    }

    function returnMyMomey() {
      importMoney = parseFloat($(".txtimporte").val());
      totalMoney = parseFloat($(".subtotal").val());
      if (!isNaN(importMoney) && !isNaN(totalMoney)) {

        if (totalMoney > importMoney) {
          returnM = totalMoney - importMoney;
          $(".reintegro").val(returnM.toFixed(2));

        } else {
          $(".reintegro").val("0");
        }
      }

    }
  </script>

</body>

</html>
<?php


?>