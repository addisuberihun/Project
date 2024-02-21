 <?php
 $msg ='';
$Fname="";
$Lname="";
$email="";
$sex="";
$password_1="";
$password_2="";
$row="";
$deposit="400";
$currency ="Birr";
$conn=mysqli_connect("localhost","root","","usercontrol");

if(isset($_POST['signup'])){
    $Fname = mysqli_real_escape_string($conn,$_POST['Fname']);
    $Lname=mysqli_real_escape_string($conn,$_POST['Lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $sex = mysqli_real_escape_string($conn,$_POST['sex']);
    $password_1=mysqli_real_escape_string($conn,$_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);
    // check  admin or user chich return 1
$sql= "SELECT * FROM control WHERE email ='". $email."' limit 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_num_rows($result);

//check admin which return 1
$query = "select Role from control where email ='". $email."' limit 1";
$q = mysqli_query($conn,$query);
$Role = mysqli_num_rows($q);
$uppercase = preg_match('@[A-Z]@', $password_1);
$lowercase = preg_match('@[a-z]@', $password_1);
$number    = preg_match('@[0-9]@', $password_1);
$specialChars = preg_match('@[^\w]@', $password_1);
session_start();
if(isset($_SESSION['LOGGEDIN']) && $row && $Role){
    header('Refresh:2;url=AdminPage.php');

}
if(isset($_SESSION['LOGGEDIN']) && $row && !$Role){
    header('Refresh:2;url=Home.php');
}

if(isset($password_1) && trim($password_1)!=''){
        if(!$lowercase && !$specialChars){
            $msg = '<div id= "msg" style ="background:#d85c86b5;">Password should be at least 8 characters in length and should include at least 
            <ul><li> one upper case letter,</li> <li>one number,</li> <li>and one special character.</li></ul> </div>';
            
        }
        else if($password_1 != $password_2){
            $msg = '<div id ="msg" style ="background:#d85c86b5;">The passwords you entered dont match! <br>please enter the password again</div>';	
        }
        else{
            $msg = '<div id ="msg" style ="background:#69a156c2;">You will get an activation key email request.</div>';	
     
            if(!$row){
                $role = "user";
                $insert= "INSERT INTO `control`(`Fname`, `Lname`, `email`, `sex`, `password_1`, `Role`) VALUES ('$Fname','$Lname','$email','$sex','$password_1','$role')";

                $accountbook ="INSERT INTO `account_book`(`name`, `email`, `password`, `deposite`, `currency`) VALUES ('$Fname','$email','$password_1','$deposit','$currency')";
                mysqli_query($conn,$accountbook);
              $query = mysqli_query($conn,$insert);
                header('Refresh:2;url = login.php');
            }
            else{
                $msg="user email account already exist please";
            }
        }
    }
    
    }
?>

<!DOCTYPE HTML>
<html>
<header>
    <title>SIGNUP FORM</title>
    <link rel="stylesheet" href="stylsheet_folder/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

</header>

<body>
    <form action="signup.php" method="POST" autocomplete="off">
    <div class="input-group">
        <!-- errror -->
            <div style="color:red">
               <?php echo $msg;?>
            </div>
            <!-- fistt name -->
            <div class="input_inside">
                <input type="text" name="Fname" oninput="fnamefun()" id="Fname" placeholder="enter Fname" require>
                </div>
                <p id="error-fname">Firstname is very small</p>
           
       <!-- last name -->
            <div class="input_inside">
                <input type="text" name="Lname" id="lname" oninput="lnamefun()" placeholder="enter Lname">
                </div>
                <p id="error-lname">Last name is very small</p>
           
<!-- email -->
          <div class="input_inside"> 
             <input type="email" name="email" oninput="checker()" id="email" placeholder="enter email" require>
            <div id="icon">
            </div></div>
                <p id="error-msg">Please Enter A Valid Email Id</p>
            
            <!-- password1 -->
           <div class="input_inside"> 
            <input type="radio" name="sex" value="male" required>male
            <input type="radio" name="sex" value="female" required>female</div>
            <div class="input_inside">
                <input type="password" name="password_1" value="" id="pass" oninput="passwordch()"
                    placeholder="enter password" required>
                <img src="photo/closed.png" alt="" id="icon1">
           </div>
          
                <p id="error-pass"> password must be strong</p>
                
                <!-- password2 -->
            <div class="input_inside">
                <input type="password" name="password_2" value="" id="pass2" placeholder="confirm password" required>
                <img src="photo/closed.png" alt="" id="icon2">
            </div>
            <p id="error-pass2">password must be match !!</p>

            <div class="btn">
                <input type="submit" name="signup" id="submit" value="signup" class="btn">
            </div><br>
            already have an account? <a href="login.php">LOGIN</a>
        </div>
    </form>
    <script src="javascript/signup.js">
    </script>
     <?php include 'footer.php'; ?> 
</body>

</html>