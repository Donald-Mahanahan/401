 <!doctype html>
 <html lang="en">
 <!-- <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 <meta charset='utf-8'> -->



 <head>
     <title>Planski</title>
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
             <form action="/action_page.php">
                 <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
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
                 <label for="vehicle3"> This will look nicer later I promise</label><br><br>
                 <button type="AddTask">Add Task</button>
                 <button type="Delete">Delete Task</button>
                 
                 <!-- 
                  $tasks = $dao->test();
                  echo $tasks;
                  echo $tasks[0];
                 ?> -->
                 
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