<?php
 error_reporting(E_ALL);
  ini_set('display_errors', 1);

$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);


require_once "$rootDir/dao.php";

// require_once dirname(__FILE__). '/../dao.php';
// //  require_once '/Dao.php';

 session_start();
 
 $dao = new Dao();
 
 $regex = "/\w{1,20}/";

 if(!preg_match($regex,$_POST['userName']) || !preg_match($regex,$_POST['password'])){
  $_SESSION['auth'] = false;
  $_SESSION['message'] = "Invalid username or password. must be 1 - 20 characters long and contain alpha-numeric characters only";
  $_SESSION['form'] = $_POST;
  header("Location: https://polar-sands-59708.herokuapp.com/login.php");
  exit;
}

echo "test error1";

$results = $dao->userExists($_POST['userName'], $_POST['password']);
// print_r($results);



unset($_SESSION['form']);
if($results){
    $_SESSION['auth'] = true;
    $_SESSION['user_id'] = $results['user_id'];
    header("Location: https://polar-sands-59708.herokuapp.com/");
    exit;
} else{
    $_SESSION['auth'] = false;
    $_SESSION['message'] = "Invalid username or password";
    $_SESSION['form'] = $_POST;
    header("Location: https://polar-sands-59708.herokuapp.com/login.php");
    exit;
}

echo "test error1";

?>