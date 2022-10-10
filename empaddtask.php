<?php 
session_start();
 if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }


echo'
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HACKATHON</title>
    <link rel="stylesheet" href="empaddtask.css">
</head>

<body>
    <div class="container">
        <div class="title">ADD TASK</div>
        <div class="content">
           
            <form action="taskadd.php" method="post">

                <div class="user-details">


                    <div class="input-box"> <label for="Task">Task Type</label>
                        <select id="Task" name="task">
                            <option value="work">Work</option>
                            <option value="meeting">Meeting</option>
                            <option value="lunch">Lunch</option>
                        </select>
                    </div>
<br><br>
                    <div class="input-box"><label for="appt">Choose a time for your task:</label>
                        <input type="datetime-local" id="appt" name="datetime"  required>
                        <small>Task Start Date and Timing</small>
                    </div>

                   <!--  <div class="input-box"><label for="appt">Choose a time for your meeting:</label>
                        <input type="time" id="appt" name="appt"  required>
                        <small>Task End Timing</small>
                    </div> -->


                    <div class="input-box">
                        <span class="details">Task Completed in Min</span>
                        <input type="number" name="minute"  placeholder="Task Completed in Min" required>
                      </div>

                    <div class="input-box">
                        <span class="details">Description Of Task</span>
                        <textarea name="comment" form="usrform"></textarea>
                    </div>


                    


                </div>
                <div class="button">
                    <input type="submit" name="add_task" value="Add Task">
                </div>
            </form>
        </div>
    </div>
    </div>

    <!-- dashboard code -->
    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="app-icon">
                </div>
            </div>


            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="empdashboard.php">
                        <span> <b>Employee Dashboard</b> </span>
                    </a>
                </li>


                <li class="sidebar-list-item">
                    <a href="">
                        <span>Add Task</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a class="two" href="login.php?logout=1">Log out</a></b>
                </li>
                </li>
                             </ul>
        </div>
    </div>
    </div>
</body>

</html>';
 ?>