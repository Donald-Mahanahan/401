<?php
error_reporting(E_ALL);
 ini_set('display_errors', 1);

$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);


require_once "$rootDir/dao.php";


session_start();
$_SESSION['bad'] = array();
$_SESSION['good'] = array();


$dao = new Dao();

$dao->deleteTask($_POST['task']);
$_SESSION['good'][] = "Thank you for posting";


header("Location: https://polar-sands-59708.herokuapp.com/");
exit();