 <?php
    session_start();
    require_once dirname(__FILE__). '/dao.php';
    error_reporting(E_ALL);
        ini_set('display_errors', 1);
    $dao = new Dao();

    if (!isset($_SESSION['auth']) || !$_SESSION['auth'] ||!isset($_SESSION['user_id']))  {
        header("Location: https://polar-sands-59708.herokuapp.com/login.php");
        exit;
    }
 ?>
 
 <!doctype html>
 <html lang="en">
 <!-- <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 <meta charset='utf-8'> -->

 <head>
     <title>Planski</title>
     <a href="/logout_handler.php">
        <div class="logout-button">Logout</div>
    </a>
     <link rel="stylesheet" type="text/css" href="evo-calendar/css/evo-calendar.css" />
     <link rel="stylesheet" type="text/css" href="evo-calendar/css/evo-calendar.midnight-blue.css" />
     <link rel="stylesheet" type="text/css" href="evo-calendar/css/evo-calendar.royal-navy.css" />
     <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
     <link rel="stylesheet" href="planski.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet"> 

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="js/myScript.js"></script>


 </head>
 <body>
     <div class="header" style="height:100%">
         Planski
         <img src="images\android-chrome-192x192.png" alt="Italian Trulli" style="height:50px">
     </div>

     <div class="row">
         <div class="column1">
            <div class="task-form-row">
                <?php
                $userName = $dao->getUsername($_SESSION['user_id']);
                echo "<h1 class='heading-index'> Welcome {$userName['userName']}</h1>";
                ?>
            </div>

            
                <form id="task-form" method="POST" action="/task_handler.php">
                    <div class="task-form-row">
                            <ul>
                        <?php
                            if (isset($_SESSION['good'])) {
                                foreach ($_SESSION['good'] as $message) {
                                echo "<div class='fadeout'><span>{$message}</span></div>";
                                }
                                foreach ($_SESSION['bad'] as $message) {
                                echo "<div class='fadeoutError'><span>{$message}</span></div>";
                                }
                            }

                        $task = $dao->testAddTask();
                        ?>
                            </ul>
                    </div>
                    <div class="task-form-row">Task: <input class="task" type="text" name="task" id="task"/></div>
                    <div class="login-form-row">
                        <input id="addTask" type="submit" name="addTask" value="Add Task"/> 
                        <input id="deleteTask" type="submit" name="deleteTask" value="Delete Task"/>
                    </div>
                </form>     


         </div>
         <div class="column2">
             <div id="calendar"></div>
         </div>
     </div>

     <div class="footer">
         Copyright 2020 &copy;
     </div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="evo-calendar/js/evo-calendar.js"></script>
        <?php
        $taskCalendar = $dao->testAddTaskCalendar();
        ?>
 </body>
 </html