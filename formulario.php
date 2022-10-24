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
    <div>
      <label for="NumeroDocumet">
        <h3 id=docNumber>Documento Nº:</h3>
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
              <input type="text" id="full_name">
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
              <select name="cars" id="cars">
                <option value="volvo">Coordinador</option>
                <option value="saab">Educador</option>
                <option value="opel">Trabajo Social</option>

              </select>
            </td>
            <td>
              <label for="">Unidad:</label>
              <input type="text">
            </td>
            <td>
              <label for="">area:</label>
              <select name="cars" id="cars">
                <option value="volvo">Esperanza</option>
                <option value="saab">Periferica</option>
                <option value="opel">Casa de Paso</option>

              </select>
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
              <input type="text">
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
            <input name="datePicker" class="form-control" />
          </td>
          <td>
            <input name="factura_number[]" type="text" />
          </td>
          <td>
            <input name="detalle_factura[]" type="text" />
          </td>
          <td>
            <input name="monto_factura[]" type="number" />
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
    document.getElementById("docNumber").innerHTML += Math.floor(Math.random() * 10);
    document.getElementById("fecha").innerHTML += Date();
  </script>
<!-- method clone this metodo permite introducir las new rows -->
  <script>
    $(document).ready(function(){
      $('body').on("click","input[name='btn-agregar']",function(e){
        // console.log(e.target.nodeName);
        var cloned_el=$(e.target).closest(".detail-row").clone(true);
        $(e.target).closest(".cuerpo-detalle").last().append(cloned_el).find("input[name='btn-eliminar']:not(:first)").prop("disabled",false);


        
      });

    });
    

  </script>

</body>

</html>
<?php


?>