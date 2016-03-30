<?php
session_start();
//session_unset();
$userId = $_SESSION['userId'];
session_destroy();
require ("recTableUpdation.php");
header("Location: ./index.php");
die();

?>
