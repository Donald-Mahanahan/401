<?php
session_start();
require_once 'Dao.php';


if (($_POST['username'] == 'zach') && ($_POST['password'] == '5678')) {
    $_SESSION['authenticated'] = true;
    header("Location: https://polar-sands-59708.herokuapp.com/");
  } else {
    $_SESSION['authenticated'] = false;
    header("Location: https://polar-sands-59708.herokuapp.com/login.php");
    exit();


$dao = new Dao();
$dao->getUsername($_POST['comment']);
$_SESSION['good'][] = "Thank you for posting";

// redirect back to the comments page
header("Location: http://cs401/comments.php");
exit();