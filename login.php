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
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
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
<html lang="en">
<head>
    <title>Login to A&K™ Studios.</title>
<style>
body{
  overflow-x: hidden;
  font-family: "Segoe UI', Tahoma, Verdana, sans-serif";
  background-color: rgb(0, 0, 0);
}
.video-background{
    width: 2020px;
    height: 1080px;     
    position: absolute;
    margin-left: 66px;
}
.hero{
        height: 100%;
        width: 100%;
        background-position: center;
        background-image: linear-gradient(rgba(0,0,0,0.4) rgba(0,0,0,0.4));
        background-image: url();
        position: absolute;
        background-size: cover;
        background-position: center;
}
.form-box{
    width: 380px;
    height: 480px;
    position: relative;
    margin: 6% auto;
    background: transparent;
    padding: 5px;
    overflow: hidden;
}
.button-box{
    width: 220px;
    margin: 35px auto;
    position: relative;
    box-shadow: 0 0 20px 9px #5900ff;
    border-radius: 30px;
	text-align: center;

}
.toggle-btn{
    padding: 10px 30px;
    cursor: pointer;
    background: transparent;
    border: 0;
    outline: none;
    position: relative;
    color: white;
}
.toggle-btn:hover{
  background-color: #5900ff;
  color: white;
  border-radius: 30px;

}
.btn{
    top: 0;
    left: 0;
    position: absolute;
    width: 110px;
    height: 100%;
    border-radius: 30px;
    transition: .7s;
}
.social-icons{
    margin: 30px auto;
    text-align: center;
}
.social-icons img{
    width: 30px;
    margin: 0 12px;
    box-shadow: 0 0 20px 0 #5900ff;
    cursor: pointer;
    border-radius: 50%;
}
.input-group{
    top: 180px;
    width: 280px;
    position: absolute;
    transition: 0.7s;
}
.input-field{
    width: 100%;
    padding: 10px 0;
    margin: 5px 0;
    border-left: 0;
    border-top: 0;
    border-right: 0;
    border-bottom: 1px solid #5900ff;
    outline: none;
    background: transparent;
    color: white;
}
.submit-btn{
    width: 85%;
    padding: 10px 30px;
    cursor: pointer;
    display: block;
    margin: auto;
    background-color: #5900ff;
    border: 0;
    outline: none;
    border-radius: 30px;
}
.submit-btn:hover{
    color: white;
}
.checkbox{
    margin: 30px 10px 30px 0;
}
span{
    color: #5900ff;
    font-size: 12px;
    bottom: 68px;    
    position: absolute;
}
#login{
    left: 50px;
}
#signup{
	margin-left: 750px;
	color: white;
}
</style>
<div class="video-background">
    <div class="video-wrap">
        <div id="video">
            
            <video id="bgvid" src="accessories\videoplayback.mp4" type="video/mp4" autoplay loop muted></video>
        </div>
    </div>
</div>
</head>
<body>
    
<div class="hero">
    <div class="form-box">
        <div class="button-box">
            <div class="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()">Log In</button> 
        </div>
        <div class="social-icons">
            <img src="https://i.pinimg.com/originals/9b/e7/a0/9be7a031fcd2215a8827ae719d546182.jpg" href="https://www.facebook.com/">
            <img src="https://image.similarpng.com/very-thumbnail/2020/06/Black-icon-Twitter-logo-transparent-PNG.png" href="https://twitter.com">
            <img src="https://img.favpng.com/14/10/12/icon-design-computer-icons-google-logo-png-favpng-8i3PpW05rd2kx28CBUz3btd73.jpg" href="https://google.com">
        </div>
        <form method="post">
			<input id="text" class="input-field" type="text" name="user_name" placeholder="Username" required=""><br><br>
			<input id="text" class="input-field" type="password" name="password" placeholder="Password" required=""><br><br>
			<button type="submit" class="submit-btn">Continue</button>
            <br><br>
			<a href="signup.php">Click to Signup</a><br><br>
		</form>
    </div>
</body>
</html>

