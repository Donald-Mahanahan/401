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
         <div class ="column1Login1">
             
         </div>
         <div class="column1Login2">
            <form  method="POST" action="/login_handler.php">
                <h1 class="heading">Login</h1>
                <div>
                    <label for="userName">Please enter your username</label>
                    <input id="userName" type="text"  name="userName" value="<?php echo $userName; ?>"  placeholder="Username">
                </div>
                <div >
                    <label  for="password">Please enter your password</label>
                    <input id="password" type="password"  name="password" placeholder="Password">
                </div>
                <div >
                    <input id="login-submit"  type="submit" value="Login">
                </div>
            </form>
        </div>
     </div>

     <div class="footer">
         Copyright 2020 &copy;

     </div>



     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="evo-calendar/js/evo-calendar.js"></script>
     <script>
         // Initialize evo-calendar in your script file or an inline <script> tag
         $(document).ready(function() {
             $('#calendar').evoCalendar({
                'theme': 'Royal Navy'
             })
         })
     </script> -->

 </body>

 </html