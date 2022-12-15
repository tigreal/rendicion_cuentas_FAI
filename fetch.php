<?php

//fetch.php;

define('DB_HOST', 'localhost');
define('DB_USER', 'sa');
define('DB_PASSWORD', 'admin12345');
define('DB_NAME', 'prueba');
define('DB_NAME2', 'formulario');
define('DB_SERVER_NAME', 'DESKTOP-GPP6M5J\MSSQLSERVER2019');


$connect = new PDO("sqlsrv:server=" . DB_SERVER_NAME . "; Database=" . DB_NAME . "", DB_USER, DB_PASSWORD);
$connect2 = new PDO("sqlsrv:server=" . DB_SERVER_NAME . "; Database=" . DB_NAME2 . "", DB_USER, DB_PASSWORD);

if (isset($_POST['query'])) {
    $query = "
 SELECT firstName,middleName,lastName,govID FROM OHEM 
 WHERE firstName LIKE '%" . trim($_POST["query"]) . "%'
 ";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $output = '';

    foreach ($result as $row) {

        $output .= '
  <li class="list-group-item contsearch">
   <a href="javascript:void(0)" class="gsearch" style="color:#333;text-decoration:none;" rel="' . $row["govID"] . '">' . $row["firstName"] . " " . $row["middleName"] . " " . $row["lastName"] . '</a>
  </li>
  ';
    }

    echo $output;
}

if (isset($_POST['registro_user'])) {
    // $name_c=(explode(" ",$_POST['email']));

    $query = "
    select top 1 * from login where carnet like 
    '%" . trim($_POST["registro_user"][1]) . "%'";
    $statement = $connect2->prepare($query);

    $res = $statement->execute();
    $result = $statement->fetchAll();
    if (count($result) > 0) {
        $query = "
        UPDATE login
        SET clave ='". trim($_POST["registro_user"][2]) ."',
        user_type='".trim($_POST["registro_user"][3])."' 
        WHERE carnet =".trim($_POST["registro_user"][1])."";

        

        $statement = $connect2->prepare($query);

        $res = $statement->execute();
        echo ($res ? 'Actulizado Satisfactoriamente' : 'Error Contactese con su profe de compu');


    } else {
        $query = "
 insert into login(name,carnet,clave,user_type)
 values('" . $_POST["registro_user"][0] . "'," . trim($_POST["registro_user"][1]) . ",'" . trim($_POST["registro_user"][2]) ."','".trim($_POST["registro_user"][3])."')";

        //  insert into login(name,carnet,clave) values('osmar', 43443443,'12345')

        $statement = $connect2->prepare($query);

        $res = $statement->execute();
        echo ($res ? 'Actulizado Satisfactoriamente' : 'Error Contactese con su profe de compu');
    }


    //  $result = $statement->fetchAll();

    // var_dump($_POST["registro_user"]);

}




// if(isset($_POST['email']))
// {
//     // $name_c=(explode(" ",$_POST['email']));
  
//  $query = "
//  SELECT top 1 govID FROM OHEM 
//  WHERE customer_email = '".trim($name_c)."'";

// //  SELECT top 1 govID FROM OHEM 
// //  WHERE firstName like '%jose%' and middleName like '%edson%' and lastName like '%quisbert%' 

//  $statement = $connect->prepare($query);

//  $statement->execute();

//  $result = $statement->fetchAll();

//  $output = '
//  <table class="table table-bordered table-striped">
//   <tr>
//    <th>First Name</th>
//    <th>Last Name</th>
//    <th>Email</th>
//    <th>Gender</th>
//   </tr>
//  ';

//  foreach($result as $row)
//  {
//   $output .= '
//   <tr>
//    <td>'.$row["customer_first_name"].'</td>
//    <td>'.$row["customer_last_name"].'</td>
//    <td>'.$row["customer_email"].'</td>
//    <td>'.$row["customer_gender"].'</td>
//   </tr>
//   ';
//  }
//  $output .= '</table>';

//  echo $output;
// }
