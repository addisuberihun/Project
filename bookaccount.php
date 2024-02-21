<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['LOGGEDIN'])){
    header('Refresh:100; url = bookaccount.php');
}

  else{
    echo '<script>alert("first login");</script>';
    header('Refresh:2; url =index.php');
  }
if(isset($_POST['submit'])){
    $conn=mysqli_connect("localhost","root","","usercontrol");
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $deposite=$_POST['deposite'];
    $currency="birr";
    $depo ="SELECT * FROM `account_book` WHERE `email` = '$email'";
    $select = mysqli_query($conn,$depo);
if(isset($_POST['submit']) && mysqli_num_rows($select)){
     
    $num = mysqli_fetch_assoc($select);
    $normal= $num['deposite']+$deposite;
$insrt="UPDATE `account_book` SET `deposite`='$normal' WHERE `email` = '$email'";
 mysqli_query($conn,$insrt);
 header('Refresh:5; url =fiction.php');
   }
   else{
echo "there is no user";
    }
}  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="stylsheet_folder/bookaccount.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <form action="bookaccount.php" method="post">
  <div class="container">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>your email</h3>
                <div class="input-field">
                    <input type="email" name="email">
                </div>
            </div>
            <div class="cvv">
                <h3>password</h3>
                <div class="input-field">
                    <input type="password" name="password" id="pass">
                    <img src="photo/closed.png" alt="" id="icon">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>amount</h3>
                <div class="input-field">
                    <input type="text" name="deposite">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>name</h3>
            <div class="selection">
                <div class="date">
                    <input type="text" name="name" id="">
                </div>
                <div class="cards">
                    <img src="photo/birr.jpg" alt="" id="birr">
                    <img src="photo/mc.png" alt="">
                    <img src="photo/vi.png" alt="">
                    <img src="photo/pp.png" alt="">

                </div>
            </div>
        </div>
        <input type="submit" name="submit" value="Confirm">
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
</body>

</html>