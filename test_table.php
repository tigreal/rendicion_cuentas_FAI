<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  td:not(:empty) {
    border: 1px solid black;
  }
  th:not(:empty) {
    border: 1px solid black;
  }
</style>
</head>

<body>

<table  align="center" style="border-color: red;">
  <thead>
    <tr>
      <th>Column 1 Header</th>
      <th>Column 2 Header</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td>Row 1, Cell 2</td>
    </tr>
    <tr>
      <td border="1">Row 2, Cell 1</td>
      <td border="1">Row 2, Cell 2</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td>Total:</td>
      <td>X</td>
    </tr>
  </tfoot>
</table>


<table>
  <tr>
    <td></td>
    <td>Row 1, Cell 2</td>
  </tr>
  <tr>
    <td>Row 2, Cell 1</td>
    <td>Row 2, Cell 2</td>
  </tr>
</table>
</body>
</html>