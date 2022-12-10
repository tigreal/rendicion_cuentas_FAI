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
          <li class="active"><a href="#">Inicio</a></li>
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

      <!-- Login
        <div class="col-sm-4 col-sm-offset-1">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2 class="heading">Entrar</h2>
            </div>
            <hr>
          </div>
          <form>
            <div class="form-group">
              <label for="login" id="loginLabel">Carnet Identidad</label>
              <input type="text" name="login" id="login" class="form-control" placeholder="xxxxxxxxxxx">
            </div>
            <div class="form-group">
              <label for="passLogin" id="passLabelLogin">Contraseña</label>
              <input type="password" name="passLogin" id="passLogin" class="form-control" placeholder="Password">
            </div>
            <button type="button" class="btn btn-success" onclick="loginCheck()" value="Login">Ingresar</button>
          </form>
        </div> -->

      Registro
      <div class="col-sm-4 col-sm-offset-2">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2>Registrarse</h2>
          </div>
          <hr>
        </div>
        <form>
          <div class="form-group">
            <label for="name" id="nameLabel">Nombre Completo</label>
            <input type="text" name="name" class="form-control" id="gsearchsimple" placeholder="Cosme Fulanito">
            <!-- donde se carga las sugerencias -->
            <ul class="list-group">

            </ul>
            <div id="localSearchSimple"></div>
            <div id="detail" style="margin-top:16px;"></div>
            <!-- donde se carga las sugerencias -->
          </div>
          <div class="form-group">
            <label for="ci">Carnet De Identidad</label>
            <input type="text" name="ci" id="ci" class="form-control" placeholder="xxxxxxxxx">
          </div>


          <div class="form-group">
            <label for="passRegister" id="passLabelRegister">Contraseña</label>
            <input type="password" name="passRegister" id="passRegister" class="form-control" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <label for="typeUser" id="typeLabelUser">Tipo Usuario</label>
            <select name="type_user" id="tipo_usurio" class="form-control">
              <option value="usuario" selected>Usuario</option>
              <option value="contadores">Contadores</option>
              <option value="administrador">Administrador</option>
            </select>
          </div>
          <button type="button" class="btn btn-success" onclick="registerCheck()" value="Register" id="registrar">Registrar</button>
          
        </form>
      </div>
    </div>
    <br><br><br>
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
          <p>llena todo los detalles que son requeridos.</p>
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
<script>
  $(document).ready(function() {
    $('#gsearchsimple').keyup(function() {
      var query = $('#gsearchsimple').val();
      $('#detail').html('');
      $('.list-group').css('display', 'block');
      if (query.length == 2) {
        $.ajax({
          url: "fetch.php",
          method: "POST",
          data: {
            query: query
          },
          success: function(data) {
            $('.list-group').html(data);
            console.log("valor devuelto"+data);
          }
        })
      }
      if (query.length == 0) {
        $('.list-group').css('display', 'none');
      }
    });

    //  $('#localSearchSimple').jsLocalSearch({
    //   action:"Show",
    //   html_search:true,
    //   mark_text:"marktext"
    //  });
    
    $(document).on('click', '.gsearch', function() {
      var email = $(this).text();
      var ci = $(this).attr('rel')
      // console.log("valor ci:"+ci);
      $('#gsearchsimple').val(email);
      $('#ci').val(ci);
      $('.list-group').css('display', 'none');
      $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
          email: email
        },
        success: function(data) {
          $('#ci').html(data);
        }
      })
    });

    $('#registrar').click(function() {
      var registro_user=[];
      registro_user.push($('#gsearchsimple').val());
      registro_user.push($('#ci').val());
      registro_user.push($('#passRegister').val());
      registro_user.push($('#tipo_usurio').val());
      
      
      // console.log(registro_user);
      $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
          registro_user: registro_user
        },
        success: function(data) {
          // $('#ci').html(data);
          alert(data);
        }
      })
    });

  });
</script>