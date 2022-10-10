<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Attendance Tracker</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="main">
        <div class="navbar">

        </div>
        <div class="content">

            <div class="form" >
                <form method="post" action="login.php">

                <h2>Login Here</h2>
                <br>
                <input type="username" name="username" placeholder="Enter Username Here">
                <input type="password" name="password" placeholder="Enter Password Here">

                <br><br>
                <button type="submit" class="btnn" name="login_user">Login</button>
            </form>

                <p class="link"> You are an Admin but haven't signed up yet?<br>
                    <a href="signup.php">Sign up </a> here</a>
                </p>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>