<?php
session_start();
if(isset($_SESSION['LOGGEDIN'])){
    header('Refresh:100; url = contact_us.php');
}

  else{
    echo '<script>alert("first login");</script>';
    header('Refresh:2; url =index.php');
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cerificate</title>
    <style>
        html {
            height: 62.5%;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .certificate {
            height: 400px;
            width: 600px;
            background-color: violet;
            margin: 100px 400px;

        }

        h2 {
            color: rgb(53, 39, 187);
            font-size: 18px;
            font-family: sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="certificate">
        <h2>
            Congratulation you are succefullly buy
        </h2>
    </div>
</body>

</html>