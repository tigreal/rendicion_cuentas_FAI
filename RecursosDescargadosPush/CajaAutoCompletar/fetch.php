<?php

//fetch.php;

define('DB_HOST', 'localhost');
define('DB_USER', 'sa');
define('DB_PASSWORD', 'admin12345');
define('DB_NAME', 'testing');
define('DB_SERVER_NAME','DESKTOP-S4UV3CT');


$connect = new PDO("sqlsrv:server=".DB_SERVER_NAME."; Database=".DB_NAME."", DB_USER, DB_PASSWORD);

if(isset($_POST['query']))
{
 $query = "
 SELECT DISTINCT customer_email FROM customer_table 
 WHERE customer_email LIKE '%".trim($_POST["query"])."%'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
  $output .= '
  <li class="list-group-item contsearch">
   <a href="javascript:void(0)" class="gsearch" style="color:#333;text-decoration:none;">'.$row["customer_email"].'</a>
  </li>
  ';
 }

 echo $output;
}

if(isset($_POST['email']))
{
 $query = "
 SELECT top 1 * FROM customer_table 
 WHERE customer_email = '".trim($_POST["email"])."'";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '
 <table class="table table-bordered table-striped">
  <tr>
   <th>First Name</th>
   <th>Last Name</th>
   <th>Email</th>
   <th>Gender</th>
  </tr>
 ';

 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row["customer_first_name"].'</td>
   <td>'.$row["customer_last_name"].'</td>
   <td>'.$row["customer_email"].'</td>
   <td>'.$row["customer_gender"].'</td>
  </tr>
  ';
 }
 $output .= '</table>';

 echo $output;
}

?>
