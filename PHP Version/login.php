<?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {

        //read from database
        $query = "select * from login_crypto where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password)
                {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location:index.php");
                    die;
                }
            }
        }
        
        echo "wrong username or password!";
    }else
    {
        echo "wrong username or password!";
    }
}


?>




<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="assets/images/coinlogo.svg" type="image/x-icon">
  <title>Login- CryptoHunters</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="css/login.css">

</head>
<body>
	<video autoplay muted loop id="myVideo">
		<source src="images/videobg.mp4" type="video/mp4">
	  </video>
<!-- partial:index.partial.html -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="box-form">
	<div class="left">
		
		<div class="overlay" style=" background-image: url('assets/images/Skyline.png'); background-position: center;  ">
			
		
		<div class="typewriter">
			<br><br><br><br><br>
			<h1  style="text-wrap: nowrap; color:#F0DB4F; ">CryptoHunters</h1>
		  </div>
		
		<p style="text-align: center;">
			
			Join us and have Crypto Insights at your fingertips.
	
	
	</p>
		
		</div>
	</div>
	
	<form method="post">
		<div class="right">
			<h5> <a href="#" style="color: #323330;"><span>Login</span></a></h5>
		<p>Don't have an account? <a href="register.php">Create Your Account</a> it takes less than a minute</p>
		<div class="inputs">
			<input id="text" type="text" name="user_name" placeholder="user name" name="user_name">
			<br>
			<input id="text" type="password" name="password" placeholder="password" name="user_name">
		</div>
			
			<br><br>
			
		<!-- <div class="remember-me--forget-password"> -->
				
	<!-- <label> -->
		<!-- <input type="checkbox" name="item" checked/> -->
		<!-- <span class="text-checkbox">Remember me</span> -->
	<!-- </label> -->
			<!-- <p>forget password?</p> -->
		<!-- </div> -->
			
			<br>
			<button type="submit" value="Login"><a    style="text-decoration: inherit;">Login</a></button>
	</div>
	</form>
</div>

  
</body>
</html>
