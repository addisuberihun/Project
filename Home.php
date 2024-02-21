
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
Home
</title>
<link rel="icon" href="loading-waiting.gif" style="border-radius: 50%; transition: 1s;" sizes="96x96"
    type="image/png">
<link rel="stylesheet" href="style.css">
<style>
  .showinteranc{
    margin:0;
    padding:0;
    float:right;
    display: inline-flex;
    color:green;
    
  }
  .displa{
    margin:0;
    padding:0;
    display:flex;
  }
  .displa p{
    display: flex;
    text-align:right;
    margin-right:3px;
    padding:1px;
  
  }
</style>
</head>

<body>


<?php include 'homeheader.php';?> 
  <div class="showinteranc" id="showinteranc">

<div class="displa" id="displa">
<marquee behavior="" direction=""><?php
 echo "<p>".$_SESSION["email"]."</p>";?></marquee>
</div>
 <div class="displa">
<?php
 echo "<p>".$_SESSION["Role"]."</p>";?>
</div>

  </div>
   <div class="CHOICE">
        <div class="box">
            
        </div>
    </div>

    <div>
  
    <?php include 'footer.php'; ?>
</body>

</html>