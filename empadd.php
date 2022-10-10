<?php
 

$db = mysqli_connect('localhost', 'root', '', 'hackathon');

$errors=array();

if (isset($_POST['emp_add'])) {
{
	$name = mysqli_real_escape_string($db, $_POST['name']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
 	$email = mysqli_real_escape_string($db, $_POST['email']);
 	$joindate =  date('Y-m-d', strtotime($_POST['joindate']));
 	$phone = mysqli_real_escape_string($db, $_POST['phone']);
 	$department = mysqli_real_escape_string($db, $_POST['department']);
 	$gender = mysqli_real_escape_string($db, $_POST['gender']);

  
     if (empty($name)) { array_push($errors, "name is required"); }
     if (empty($email)) { array_push($errors, "Email is required"); }
     if (empty($joindate)) { array_push($errors, "joindate is required"); }
     if (empty($phone)) { array_push($errors, "phone is required"); }
     if (empty($department)) { array_push($errors, "department is required"); }
     if (empty($gender)) { array_push($errors, "gender is required"); }
 
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM empdata WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $emails = mysqli_fetch_assoc($result);
  
  if ($emails) { // if user exists
    if ($emails['email'] === $email) {
      array_push($errors, "email already exists");
    }

    // if ($user['email'] === $email) {
    //   array_push($errors, "email already exists");
    // }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO empdata (name, password, email, joindate, phone, department, gender)
    		  VALUES ('$name', '$password', '$email', '$joindate', '$phone', '$department', '$gender')";

    mysqli_query($db, $query); 

     $query = "INSERT INTO users (position, username, password) 
          VALUES('Employee','$name', '$password')";
    mysqli_query($db, $query);

   $query= "CREATE TABLE $name (
    sn int NOT NULL AUTO_INCREMENT,
    day date, 

    mc int DEFAULT '0',
    wc int DEFAULT '0',
    bc int DEFAULT '0',

    PRIMARY KEY (sn)
    )";
   mysqli_query($db, $query);

    header('location: dashboard.php');
  }
}


?>