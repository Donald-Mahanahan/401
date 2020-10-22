<?php
session_start();
require_once 'Dao.php';
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
  header("Location: http://cs401/comments.php");
  exit();
}

$dao = new Dao();
$dao->addTask($_POST['task']);
$_SESSION['good'][] = "Thank you for posting";

// redirect back to the comments page
// header("Location: http://cs401/comments.php");
exit();