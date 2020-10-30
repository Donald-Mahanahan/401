<?php
    session_start();
    session_destroy();
    header("Location: https://polar-sands-59708.herokuapp.com/login.php");
    exit;
?>