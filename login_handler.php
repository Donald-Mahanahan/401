<?php
 require_once dirname(__FILE__). '/../handlers/Dao.php';

 session_start();
 
 $dao = new Dao();
 
 $regex = "/\w{1,20}/";


// if (($_POST['username'] == 'zach') && ($_POST['password'] == '5678')) {
//     $_SESSION['authenticated'] = true;
//     $_SESSION['form'] = $_POST;
//     header("Location: https://polar-sands-59708.herokuapp.com/");
//   } else {
//     $_SESSION['authenticated'] = false;
//     header("Location: https://polar-sands-59708.herokuapp.com/login.php");
//     exit();

if(!preg_match($regex,$_POST['userName']) || !preg_match($regex,$_POST['password'])){
  $_SESSION['auth'] = false;
  $_SESSION['message'] = "Invalid username or password. They must be 1 - 20 characters long and contain alpha-numeric characters only";
  $_SESSION['form'] = $_POST;
  header("Location: https://polar-sands-59708.herokuapp.com/login.php");
  exit;
}

$results = $dao->userExists($_POST['userName'], $_POST['password']);


// $dao = new Dao();
// $dao->getUsername($_POST['comment']);
// $_SESSION['good'][] = "Thank you for posting";

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

// redirect back to the comments page
// header("Location: http://cs401/comments.php");
?>