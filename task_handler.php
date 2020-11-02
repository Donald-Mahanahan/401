<?php
error_reporting(E_ALL);
 ini_set('display_errors', 1);

$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);


require_once "$rootDir/dao.php";


session_start();
// require_once 'KLogger.php';
// $logger = new KLogger ("log.txt" , KLogger::DEBUG);
$_SESSION['bad'] = array();
$_SESSION['good'] = array();

// validating


if (strlen($_POST['task']) == 0) {
  $_SESSION['bad'][] = "Please enter a comment";
}

if (strlen($_POST['task']) > 256) {
  $_SESSION['bad'][] = "Comment is too long.";
}

if (count($_SESSION['bad']) > 0) {
  header("Location: https://polar-sands-59708.herokuapp.com/");
  exit();
}

$dao = new Dao();

if($_POST["addTask"]) {
  echo "error1";
  $dao->addTask($_POST['task']);
}
//You can do an else, but I prefer a separate statement
if($_POST["deleteTask"]) {
  echo "error2";
  //User hit the Submit for Approval button, handle accordingly
  $dao->deleteTask($_POST['task']);
}

$_SESSION['good'][] = "Thank you for posting";

// redirect back to the comments page
header("Location: https://polar-sands-59708.herokuapp.com/");
exit();