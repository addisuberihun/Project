<?php 
session_start();
$conn=mysqli_connect("localhost","root","","usercontrol");
$sql= "SELECT email FROM control WHERE Role = 'admin' limit 1";

$result = mysqli_query($conn,$sql);
$row = mysqli_num_rows($result);


if(isset($_SESSION['LOGGEDIN']) && $result){
    header('Refresh:100;url=AdminPage.php');
}
   else{
    header('Refresh:1;url=index.php');
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminpage</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <?php include 'adminheader.php';?> 
        <div class="adminbody">
            <div class="addbook">
                
            </div>
        </div>
      <?php include 'footer.php'; ?> 
    </div>
</body>

</html>