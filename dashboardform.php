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
  <link rel="stylesheet" href="dashboardform.css">
</head>

<body>
  
    
    <div class="container">
      
      <div class="title">Add Employee</div>
            <div class="content">
        <form method="post" action="empadd.php">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" name="name" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
              <span class="details">Joining date</span>
              <input type="date" name="joindate" placeholder="Joining date" required>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" name="phone" placeholder="Enter your number" required>
            </div>
            <div class="input-box">
              <span class="details">Department</span>
              <input type="text" name="department" placeholder="Department" required>
            </div>
            <div class="input-box">
              <span class="details"> Password</span>
              <input type="password" name="password" placeholder=" password" required>
            </div>
          </div>
          <div class="gender-details">
            <input type="radio" name="gender" id="dot-1">
            <input type="radio" name="gender" id="dot-2">
            <input type="radio" name="gender" id="dot-3">
            
            <span class="gender-title">Gender</span>
            <div class="category">
              <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Prefer not to say</span>
              </label>
            </div>
          </div>
          <div class="button">
            <input type="submit" name="emp_add" value="Add Employee">
          </div>
        </form>
      </div>
    </div>
    </div>
  <div class="app-container">
    <div class="sidebar">
      <div class="sidebar-header">
        <div class="app-icon">
        </div>
      </div>


      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <a href="dashboard.php">
            <span> <b>Admin Dashboard</b>  </span>
          </a>
        </li>


        <li class="sidebar-list-item">
          <a href="#">
            <span>Add Employee</span>
          </a>
        </li>
        <li class="sidebar-list-item">
                    <a class="two" href="login.php?logout=1">Log out</a></b>
                </li>
      </ul>
    </div>
  </div>
  </div>
</body>

</html>';
 ?>