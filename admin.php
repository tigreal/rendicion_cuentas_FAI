<?php
session_start();
if (isset($_SESSION['start'])) {
  header("Location: account.php");
}
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

    input {
      border-radius: 0px;
    }
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
          
          <li class="active"><a href="#">Registro</a></li>
          <li class="active"><a href="#">Rendicion de cuentas</a></li>
          
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="#Register"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li> -->
          <li><a href="#Login"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Body -->
  <div class="container"><br><br>
    <div class="row">

      <!-- Login -->
      <div class="col-sm-4 col-sm-offset-1">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2 class="heading">Entrar</h2>
          </div>
          <hr>
        </div>
       
      </div>

     
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Error</h4>
            </div>
            <div class="modal-body">
              <p>Revise su carnet o contraseña.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>

        </div>
      </div>

      <!-- Scripts -->
      <script type="text/javascript" src="js/login_validate.js"></script>
      <!-- <script type="text/javascript" src="js/register_validate.js"></script> -->
</body>


</html>