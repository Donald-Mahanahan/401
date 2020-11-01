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
     <title>PlanskiXXX</title>
     <a id="logout" href="/logout_handler.php">
        <p>Logout</p>
    </a>
     <link rel="stylesheet" type="text/css" href="evo-calendar/css/evo-calendar.css" />
     <link rel="stylesheet" type="text/css" href="evo-calendar/css/evo-calendar.midnight-blue.css" />
     <link rel="stylesheet" type="text/css" href="evo-calendar/css/evo-calendar.royal-navy.css" />
     <link rel="icon" type="image/x-icon" href="images/favicon.ico" />

     <link rel="stylesheet" href="planski.css">
 </head>

 <body>

     <div class="header" style="height:100%">
         Planski
         <img src="images\android-chrome-192x192.png" alt="Italian Trulli" style="height:50px">
     </div>

     <div class="row">
         <div class="column1">
                <?php
                $userName = $dao->getUsername($_SESSION['user_id']);
                echo "<p> Welcome {$userName['userName']}</p>";
                ?>
             <form method="POST" action="/task_handler.php">
             <?php
                require_once "/dao.php";
                $CAT = "</td>";
                    // Attempt select query execution
                    $sql = "SELECT * FROM task";
                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Salary</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td>" . $row['user_id'] . $CAT;
                                        echo "<td>" . $row['task_id'] . $CAT;
                                        echo "<td>" . $row['event_date'] . $CAT;
                                        echo "<td>" . $row['task'] . $CAT;
                                        // echo "<td>";
                                        //     echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                        //     echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        //     echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    unset($pdo);
                
                ?>
                 <!-- <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                 <label for="vehicle1"> This</label><br>
                 <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                 <label for="vehicle2"> will be</label><br>
                 <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                 <label for="vehicle3"> information</label><br>
                 <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                 <label for="vehicle1"> that mirrors</label><br>
                 <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                 <label for="vehicle2"> the date selected</label><br>
                 <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                 <label for="vehicle2"> on the calendar view</label><br>
                 <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                 <label for="vehicle3"> This will look nicer later I promise</label><br><br> -->
                 <div>Task: <input type="text" name="task" id="task"/></div>
                 <button type="AddTask">Add Task</button>
                 <button type="DeleteTask">Delete Task</button>
                 
                 
                 <?php
                  $task = $dao->test();
                  print_r($task);
                //   echo $users[0];
                 ?>
                 
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
     <script>
         // Initialize evo-calendar in your script file or an inline <script> tag
         $(document).ready(function() {
             $('#calendar').evoCalendar({
                'theme': 'Royal Navy'
             })
         })
     </script>

 </body>

 </html