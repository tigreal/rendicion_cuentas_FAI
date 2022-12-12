<?php
session_start();
require_once dirname(__DIR__) . '/ArcoIrisRediCuentas/config/database.php';
session_destroy();
header("Location:".URL."/index.php");
  exit;
?>