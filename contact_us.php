<?php
session_start();
if(isset($_SESSION['LOGGEDIN'])){
    header('Refresh:100; url = contact_us.php');
}

  else{
    echo '<script>alert("first login");</script>';
    header('Refresh:2; url =index.php');
  }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact us</title>
    <style>

.contact_conatiner .contact_box li {
            list-style: none;
            margin :0;
    padding :0;
    display: inline-flex;
        }

       .contact_box ul label {
            font-family: sans-serif;
            margin-bottom: 10px;
            font-size: 25px;
        }

        .contact_conatiner {
            margin-top: 30px;
            margin-left: 200px;
            display: inline-flex;
        }
.contact_box img{
    height: 35px;
    width:35px;
    margin :0;
    padding :0;
   
}

        .contact_box ul li a {
            font-size: 20px;
            font-family: sans-serif;
           text-decoration: none;
            margin :0;
           padding :0;
        }

        .contact_box {
            margin: 60px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php include 'header.php';?>
    <div class="contact_conatiner">
        <div class="contact_box">
            <ul>
                <label for="">contacts</label><br>
                <li><img src="photo/email.jpg" alt=""> <a href="mailto: berihunaddisu9@gmail.com">email</a></li><br>
                <li><img src="photo/telegram.jpg" alt=""><a href="https://t.me/Mullkidano">telegram</a></li>
                <li> <img src="photo/tiktok.png" alt=""><a href="#">tik tok</a></li>
            </ul>
        </div>
        <div class="contact_box">
            <ul>
                <label for="">websites</label><br>
                <li><img src="photo/github.png" alt="" style="border-radius:50%"><a href="https://github.com/addisu-berihun/">github</a></li><br>
                <li><img src="photo/youtube.jpg" alt=""><a href="#">youtube</a></li>
                <li><img src="photo/whatsapp.png" alt=""><a href="#">whatsapp</a></li>
            </ul>
        </div>
        <div class="contact_box">
            <ul>
                <label for="">direct_contact</label>
                <li><img src="photo/phone.png" alt=""><a href="tel:099-672-7325">phone</a></li><br>
                <li><img src="photo/imo.png" alt=""><a href="imo ://9.8.000000015927">imo</a></li><br>
                <li><img src="photo/facebook.jpg" alt=""><a href="#">facebook</a></li>
            </ul>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>