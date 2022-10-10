<?php

session_start();

$username=$_SESSION['username'];
 
echo $username;
echo '<br>';
 
$db = mysqli_connect('localhost', 'root', '', 'hackathon');

$errors=array();

if (isset($_POST['add_task']))
 {

	$name =  $username; 
  $task=   mysqli_real_escape_string($db, $_POST['task']);
  $minute=   mysqli_real_escape_string($db, $_POST['minute']);
  $datetime= mysqli_real_escape_string($db, $_POST['datetime']);

  $date = strtotime($datetime);
$date= date('Y-m-d', $date);   
echo $date;
echo '<br>';

  $date_check_query = "SELECT * FROM $name WHERE day='$date' LIMIT 1";
  $result = mysqli_query($db, $date_check_query);
  $dates = mysqli_fetch_assoc($result);
  if($dates)
   { 
    if ($dates['day'] === $date) 
    { 
          if (!strcasecmp($task, 'work')) {
    // code...
       $wc=$minute;

      $query=" UPDATE $name SET wc = '$wc' WHERE day = '$date' ";
        mysqli_query($db, $query); 
        
  }
    if (!strcasecmp($task, 'meeting')) {
    // code...
       $mc=$minute;
         $query=" UPDATE $name SET mc = '$mc' WHERE day = '$date' ";
         mysqli_query($db, $query); 
       
  }
    if (!strcasecmp($task, 'lunch')) {
    // code...
       $bc=$minute;
      $query=" UPDATE $name SET bc = '$bc' WHERE day = '$date' ";
      mysqli_query($db, $query); 
       
  }
  header('location: empdashboard.php');
 }
}
else
{
   


echo "madarchod";

   if (!strcasecmp($task, 'work')) {
    // code...
       $wc=$minute;

$query = "INSERT INTO $name (day,wc)
           VALUES ('$date','$wc')";

  mysqli_query($db, $query); 
  //  header('location: empdashboard.php');
        
  }
    if (!strcasecmp($task, 'meeting')) {
    // code...
       $mc=$minute;
        $query = "INSERT INTO $name (day,mc)
           VALUES ('$date','$mc')";
           mysqli_query($db, $query); 
   // header('location: empdashboard.php');

       
  }
    if (!strcasecmp($task, 'lunch')) {
    // code...
       $bc=$minute;
     $query = "INSERT INTO $name (day,bc)
           VALUES ('$date','$bc')";
           mysqli_query($db, $query); 
   // header('location: empdashboard.php');
       
  }
  header('location: empdashboard.php');

}

  
 
 



     

 }



?>