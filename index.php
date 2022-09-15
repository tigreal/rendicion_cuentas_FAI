<!DOCTYPE html>
<html>

<head>
  <!-- Import Pure CSS -->
  <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" />
  <!-- timePicker css file -->
  <link rel="stylesheet" href="css/dtsel.css" />

  <!-- Used to optimized Website for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    h1 {
      color: green;
    }
  </style>
</head>

<body>
  <div class="container">



    <!-- field to add values how fecha factura detalle monto -->
    <!-- Here pure-table class is used -->
    <table class="pure-table">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Factura</th>
          <th>Detalle</th>
          <th>Monto</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <!-- datePicker campo -->
            <input name="datePicker" class="form-control" />
          </td>
          <td>
            <input name="factura-input" />
          </td>
          <td>
            <input name="detalle-input" />
          </td>
          <td>
            <input name="monto-input" type="number" />
          </td>
        </tr>

      </tbody>


    </table>
    <table class="pure-table">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Factura</th>
          <th>Detalle</th>
          <th>Monto</th>
          
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
    </table>
  </div>
<!-- javascript configuracion of the TimePicker -->
  <script src="js/dtsel.js"></script>
    <script>
      instance = new dtsel.DTS('input[name="datePicker"]', {
        direction: "BOTTOM",
      });
      instance = new dtsel.DTS('input[name="dateTimePicker"]', {
        direction: "BOTTOM",
        dateFormat: "yyyy-mm-dd",
        showTime: true,
        timeFormat: "HH:MM:SS",
      });
      instance = new dtsel.DTS('input[name="timePicker"]', {
        direction: "BOTTOM",
        showTime: true,
        showDate: false,
      });
    </script>

</body>

</html>
<?php


?>