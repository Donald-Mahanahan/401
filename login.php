<?php
  session_start();
  $userName = "";
  if(isset($_SESSION['form'])){
      $userName = $_SESSION['form']['userName'];
  }
?>
 
 <!doctype html>
 <html lang="en">
 <!-- <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 <meta charset='utf-8'> -->

 <head>
     <title>Planski</title>
     <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
     <link rel="stylesheet" href="planski.css">
 </head>

 <body>

     <div class="header" style="height:100%">
         Planski
         <img src="images\android-chrome-192x192.png" alt="Italian Trulli" style="height:50px">
     </div>



     <div class="row">
         <div class="column1Login2">
            <form id="login-form" method="POST" action="/login_handler.php">
                <h1 class="heading">Login</h1>
                <div class="login-form-row">
                <?php
                    
                    if (isset($_SESSION['message'])) {
                        echo "<div><span class='fadeout'>{$_SESSION['message']}</span></div>";
                        unset($_SESSION['message']);
                    }
                ?>
                    <label for="userName"></label>
                    <input id="userName" type="text"  name="userName" value="<?php echo $userName; ?>"  placeholder="Username">
                </div>
                <div class="login-form-row" >
                    <label  for="password"></label>
                    <input id="password" type="password"  name="password" placeholder="Password">
                </div>
                <div class="login-form-row" >
                    <input id="login-submit"  type="submit" value="Login">
                </div>
            </form>
        </div>
     </div>

     <div class="footer-Login">
         Copyright 2020 &copy;
     </div>

 </body>

 </html