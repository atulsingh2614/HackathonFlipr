<?php 

session_start();

$name=$_SESSION['username'];
 
 



 if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

// echo $name;

$db = mysqli_connect('localhost', 'root', '', 'hackathon');


$sql = "SELECT * FROM `empdata`";
$result = $db->query($sql);

$i=0;
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) 
{
     $empname[$i]= $row["name"];
         

$i++;
 }
}
 


echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HACKATHON</title>


    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="app-icon">
                </div>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="dashboard.php">
                        <span> <b>Admin Dashboard</b> </span>
                    </a>
                </li>


                <li class="sidebar-list-item">
                    <a href="dashboardform.php">
                        <span>Add Employee</span>
                    </a>
                </li>

                <li class="sidebar-list-item">
                    <a class="two" href="login.php?logout=1">Log out</a></b>
                </li>
            </ul>
        </div>
        <div class="tab">
            <table class="table" >

                <tr>
                    <th><b>S.No.</b></th>
                    <th><b>Name</b></th>
                     
                </tr>


                <tbody>';

                    for($a=0;$a<$i; $a++){echo '
                <tr>
                    <th><b>'.$a+1 .'</b></th>
                       <form method="post" action="empdata.php"> 

                       <th> <input type="text" id="empname" name="empname" value="'.$empname[$a].'" readonly></th> 
                    
                     <th>  <button type="submit" class="btn" name="emp_name">show details</button></th>
                </tr>';
                }

                echo'
                  
                    
                 
                   
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>';

?>