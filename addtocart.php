<?php
// error_reporting(E_ERROR | E_PARSE);

if(isset($_POST['submit'])){
    $conn=mysqli_connect("localhost","root","","usercontrol");
    $price_item=$_POST['price_item'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    // $deposite=$_POST['deposite'];
    $date=$_POST['date'];
    $depo ="SELECT * FROM `account_book` WHERE `email` = '$email' AND `password` = '$password'";
    $select = mysqli_query($conn,$depo);
if( mysqli_num_rows($select)){
    $num = mysqli_fetch_assoc($select);
    $normal= $num['deposite'];
 echo $normal;
           if($price_item <=$normal){
            echo "<div class= 'msg' style ='color: #6de581b8;'>
           please add to account here
			</div>" ;
        
          header('Refresh:2; url =certificate.php');
            }
        
               }
       else{
        header('Refresh:5; url =bookaccount.php');
            
        }

    
    
}
mysqli_close($conn);
?>