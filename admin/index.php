<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
body,html {
  /*  background-image: url('https://i.imgur.com/xhiRfL6.jpg');*/
    height: 100%;
}
#profile-img {
    height:180px;
}
.h-80 {
    height: 80% !important;
}
</style>
</head>
<title>Scpwd-Admin</title>
<body>
  
<div class="container h-80">
<div class="row align-items-center h-100">
    <div class="col-3 mx-auto">
        <div class="text-center">
            <img id="profile-img" class="rounded-circle profile-img-card" src="../images/logo.png" style="margin-top:100px;"/>
            <p id="profile-name" class="profile-name-card"></p>
            <form  class="form-signin" action="" method="post">
				<input type="text" name="username" id="inputUsername" class="form-control form-group" placeholder="Username" required autofocus>	
                <input type="password" name="password" id="inputPassword" class="form-control form-group" placeholder="Password" required autofocus>
                <button class="btn btn-lg btn-primary btn-block btn-signin" name="login" type="submit">Login</button>
            </form><!-- /form -->
        </div>
    </div>
</div>
</div>
<?php
include("dbconnect.php");
if(isset($_POST['login']))
{
	$user = $_POST['username'];
	$pass = $_POST['password'];
	// $pwd = md5($pass);
 if($user == 'admin')
 {
	$sel = mysqli_query($con,"SELECT * FROM `users` WHERE `username` = '$user' AND `password` = '$pass' ");
	$row = mysqli_num_rows($sel);
	$fet = mysqli_fetch_assoc($sel);

	if($row == 1)
	{
		if($fet['username'] == $user )
		{
		$_SESSION['userSession'] = $fet['username'];	
		 header("Location: adminhome.php");
		}
		else
		{
			echo '<script>alert("Please Enter Valid Credentials");</script>';
		}
	}
	else
	{
		echo '<script>alert("Admin not Exist");</script>';
	}
}else{
	$sel = mysqli_query($con,"SELECT * FROM `novireg` WHERE `username` = '$user' AND `password` = '$pass' ");
	$row1 = mysqli_num_rows($sel);
	$fet = mysqli_fetch_assoc($sel);

	if($row1 == 1)
	{
		if($fet['username'] == $user )
		{
		$_SESSION['userSession'] = $fet['username'];
		$_SESSION['email'] = $fet['email'];	
		 header("Location: recruiterhome.php");
		}
		else
		{
			echo '<script>alert("Please Enter Valid Credentials");</script>';
		}
	}
	else
	{
		echo '<script>alert("Recruiter not Exist");</script>';
	}
}
}
?>


</body>
</html>

