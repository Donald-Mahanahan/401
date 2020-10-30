<?php
//  require_once dirname(__FILE__). '/Dao.php';
 require_once '/Dao.php';

 session_start();
 
 $dao = new Dao();
 
 $regex = "/\w{1,20}/";

 error_reporting(E_ALL);
    ini_set('display_errors', 1);

// if (($_POST['username'] == 'zach') && ($_POST['password'] == '5678')) {
//     $_SESSION['authenticated'] = true;
//     $_SESSION['form'] = $_POST;
//     header("Location: https://polar-sands-59708.herokuapp.com/");
//   } else {
//     $_SESSION['authenticated'] = false;
//     header("Location: https://polar-sands-59708.herokuapp.com/login.php");
//     exit();

echo "test error1";

?>