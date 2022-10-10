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

date_default_timezone_set('Asia/Kolkata');
$tdate =  date("Y-m-d");
// $myDate++;
 
 



  $date_check_query = "SELECT * FROM $name WHERE day='$tdate' LIMIT 1";
  $result = mysqli_query($db, $date_check_query);
  $row = mysqli_fetch_assoc($result);

  $cmc=$row['mc'];
   $cwc=$row['wc'];
    $cbc=$row['bc'];

  $pdate= date('Y-m-d', time() - 60 * 60 * 24);

   $date_check_query = "SELECT * FROM $name WHERE day='$pdate' LIMIT 1";
  $result = mysqli_query($db, $date_check_query);
  $row = mysqli_fetch_assoc($result);

  $pmc=$row['mc'];
   $pwc=$row['wc'];
    $pbc=$row['bc'];
 

$i=24;
$j=0;
$ddate=$tdate;
$datediff="";
 

 while($j<7){
 $j++;
 $date_check_query = "SELECT * FROM $name WHERE day='$ddate' LIMIT 1";
$result = $db->query( $date_check_query );
  $row =  $result->fetch_assoc();
 
  $dmc[$j]=$row["mc"];
   $dwc[$j]=$row["wc"];
    $dbc[$j]=$row["bc"];
//echo "<br>dmc=".$dmc[$j];



 
$ddate=date('Y-m-d', time() - 60 * 60 * $i);
 $now = strtotime($tdate);
 $your_date = strtotime($ddate);
 $datediff = $now - $your_date ;
 $datediff= round($datediff / (60 * 60 * 24));
//echo ' datediff='.$datediff;
$i=$i+24;
 }






 
 








    echo '








<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>HACKATHON</title>
  <link rel="stylesheet" href="empdashboard_new.css">
  <!-- <link rel="stylesheet" media="screen and (max-width:1100px)" href="presp.css"> -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Genre", "break(in mins)", "meeting(in mins)", "work(in mins)"
           ],';


           $aajdate=$tdate;

           $m=1;
           $i=24;
for($m=1;$m<8;$m++){

echo '["'.$aajdate.'", '.$dbc[$m] .', '. $dmc[$m] .', '.$dwc[$m]  .',], ';

$aajdate=date('Y-m-d', time() - 60 * 60 * $i);
$i=$i+24;

} 
           echo'
        
      ]);

      var options = {
        width: 800,
        height: 300,
        legend: { position: "top", maxLines: 3 },
        bar: { groupWidth: "75%" },
        isStacked: true,
        backgroundColor: "transparent",
      };

      var chart = new google.visualization.BarChart(document.getElementById("barchart"));
      chart.draw(data, options);
    }
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
      ["Task", "Hours per Day"],
          ["Break",     '.$cbc.'],
          ["Meeting",      '.$cmc.'],
          ["Work",       '.$cwc.'],

      ]);

      var options = {
        title: "Current Day",
        pieHole: 0.4,
        width: 520,
        is3D:true,
        backgroundColor: "transparent",
      };

      var chart = new google.visualization.PieChart(document.getElementById("donutchart1"));
      chart.draw(data, options);
    }
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Task", "Hours per Day"],
          ["Break",     '.$pbc.'],
          ["Meeting",      '.$pmc.'],
          ["Work",       '.$pwc.'],
      ]);

      var options = {
        title: "Previous day",
        pieHole: 0.4,
        width: 520,
        is3D:true,
        backgroundColor: "transparent",
      };

      var chart = new google.visualization.PieChart(document.getElementById("donutchart"));
      chart.draw(data, options);
    }
  </script>
</head>

<body>
  <!-- dashboard code -->
  <div class="app-container">
    <div class="sidebar">
      <div class="sidebar-header">
        <div class="app-icon">
        </div>
      </div>


      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <a href="#">
            <span> <b>Employee Dashboard</b> </span>
          </a>
        </li>


        <li class="sidebar-list-item">
          <a href="empaddtask.php">
            <span>Add Task</span>
          </a>
        </li>
           <li class="sidebar-list-item">
                    <a class="two" href="login.php?logout=1">Log out</a></b>
                </li>
        <!-- <li class="sidebar-list-item">
          <a href="#">
            <span>Your Details</span>
          </a>
        </li> -->

      </ul>
    </div>
    <div  id="donutchart1" class="p1"></div>
    <div id="donutchart" class="p2"></div>
    <div id="barchart" class="s1"></div>
  </div>
  </div>
</body>

</html>';




?>