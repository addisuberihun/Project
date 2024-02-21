<?php 
error_reporting(E_ERROR | E_PARSE);
$email="";
$password="";
$err="";
$eror="";
$conn=mysqli_connect("localhost","root","","usercontrol");
if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
	$email = $_COOKIE['email'];
	 $password = $_COOKIE['password'];
	 }
	 else
   {
	 $email = $password ="";
   }
$user = correct($_POST['email']);
	$password = correct($_POST['password']);
	session_start();
	$query = "select *from control where email = '".$user."' and password_1= '".$password."' limit 1";
	$q = mysqli_query($conn ,$query);

	// $email =mysqli_num_rows($q);
	$role = "select  *from control where email = '".$user."' and Role='admin' limit 1";
	$ad = mysqli_query($conn,$role);
	$admin = mysqli_num_rows($ad);
	if(isset($_POST['button'])){ 
		if(!empty($email) && !empty($password))
		{
			$query = "select * from control where email = '".$email."' AND password ='".$password."' ";
			$result = mysqli_query($con, $query);
      $user_data = mysqli_fetch_assoc($result);
      $full_name = $user_data['email'];
	  

      if(isset($_REQUEST['remember_me']))
    {
      setcookie('email',$_REQUEST['email'],time()+60*60);//1 hour
      setcookie('password',$_REQUEST['password'],time()+60*60); //1 hour
    }
    else
    {
      setcookie('email',$_REQUEST['email'],time()-10);//10 seconds
      setcookie('password',$_REQUEST['password'],time()-10); //10 seconds
    }

}
		if(isset($_SESSION["LOGGEDIN"]) && $admin!=1){
			header('location: Home.php');
		}
		
		else if(mysqli_num_rows($q)==0 && $admin!=1){
			// we can use this nested if to display texts
			// The trim function checks if inputs are only spaces and will trim from beggining and end side
			$eror= "<div class= 'msg' style ='color: red; text-align: center;'>
			you have not account
		<u>create account</u> please 
			</div>" ;
			
		}
		else if( (isset($user) &&trim($user) == '') || (isset($password) && trim($password) == '') ){
			$eror= "<div class= 'msg' style ='color: red; text-align: center;'>
			Sorry the user name and password you <u>entered</u> is not quite right. Have you forgotten your <u>password</u>? 
			</div>" ;
		}
		else if(mysqli_num_rows($q) == 1 && $admin!=1){
			echo "<div class= 'msg' style ='background : #6de581b8;'>
			Login successful, welcome '$user'
			</div>" ;
			//Array association that gives key:value pair
			$row = mysqli_fetch_assoc($q);
			$_SESSION["email"] = $user;
			$_SESSION["USERID"]= $row['id'];
			$_SESSION["LOGGEDIN"] = true;
			$_SESSION["Role"] = $row['Role'];
			
			//jscode to direct flow to index.php
			echo'<script>
				window.setTimeout(function () {
					window.location.href = "Home.php";
				}, 2000);
			</script>';
		}
		else if(mysqli_num_rows($q) == 1 && $admin == 1){
			$eror="<div class= 'msg' style ='background : #6de581b8;'>c 
		Login successful, welcome '$user'
			</div>" ;
			//Array association that gives key:value pair
			$row = mysqli_fetch_assoc($q);
			$_SESSION["email"] = $row['email'];
			$_SESSION["adminid"]= $row['id'];
			$_SESSION["LOGGEDIN"] = true;
			$_SESSION["Role"] = $row['Role'];
			$eror= '<script>
				window.setTimeout(function () {
					window.location.href = "AdminPage.php";
				}, 2000);
			</script>';

		}
		
		else{
			echo "i dont know what happened $err;";
		}
	}

	function correct($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN</title>
	<link rel="stylesheet" href="stylsheet_folder/login.css">
	<link rel="icon" href="loading-waiting.gif" sizes="96x96" type="image/png">
</head>

<body>
	<div class="msg">
		<?php echo $eror;?>
	</div>
	<form action="login.php" method="post">
		<div class="logincon">
			<div class="loginhere" style=" padding: 0; margin: 0;">
				<h3>Login here</h3>
			</div>

			<div class="em">
				<input type="email" name="email" placeholder="enter email">
			</div>
			<div class="show">

				<input type="password" id="pass" name="password" placeholder="enter password">
				<img src="photo/closed.png" alt="" id="icon">
			</div>
			

     <div class="rem" style="display:inline-flex; height: 30px;width: 30px;"> 
	 <input type="checkbox" name="remember_me" id="remember">
        <label for="remember">Remember Me</label>
	 </div><br>

				<input type="submit" class="submit" name="button">
				<br>
				<h3>not yet a member?<a href="signup.php">signup</a></h3>



</div>
	</form>
	<script>
		var password = document.getElementById("pass");

		var icon = document.getElementById("icon");
		icon.onclick = () => {
			if (password.type == "password") {
				password.type = "text";
				icon.src = "photo/eye.png";
			}

			else {
				password.type = "password";
				icon.src = "photo/closed.png";
			}
		}
	</script>
	<?php include 'footer.php'; ?>
</body>

</html>