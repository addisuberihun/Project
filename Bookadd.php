<?php
$conn=mysqli_connect("localhost","root","","usercontrol");

$err = "";
session_start();
if(isset($_SESSION['LOGGEDIN']) && $_SESSION["Role"]=="user"){
     header('location: index.php');
}
$dat=isset($_POST['btn']);
if($dat){
  
    $booktype=$_POST['booktype'];
    $bookname=$_POST['bookname']; 
    $author=$_POST['author'];
    $title=$_POST['title'];
    $ISBN=$_POST['ISBN'];
    $publication_date=$_POST['publication_date'];
    $revised_date=$_POST['revised_date'];
    $page_number=$_POST['page_number'];
    $price=$_POST['price'];
    $currency=$_POST['currency'];
    $image=$_POST['image'];
    
    //$name = $_POST["name"];
   
     
        if(empty($booktype) || empty($bookname) || empty($title) || empty($author) || empty($ISBN) || empty($publication_date) || empty($revised_date) || empty($page_number) || empty($price) || empty($currency)){
            $err = "all data must be full filled";
            }
            else{
             $query="SELECT `title`, `ISBN`FROM `booktable` WHERE title='$title' AND ISBN='$ISBN'";
             $result=mysqli_query($conn,$query);
             $row=mysqli_fetch_assoc($result);
         if(!$row){
             $sql="INSERT INTO booktable(`booktype`, `bookname`, `title`, `author`, `ISBN`, `publication_date`, `revised_date`, `page_number`, `price`, `currency` ,`photofile`) VALUES ('$booktype','$bookname','$title','$author','$ISBN','$publication_date','$revised_date','$page_number','$price','$currency','$image')";
             if(!mysqli_query($conn,$sql)){
             $err="data is not inserted";
             }
           }
           else{
             $err = "Book already exist";
           }
            }
      }
    

    

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add book</title>
    <link rel="stylesheet" href="stylsheet_folder/bookadd.css">
    <style>
        .bookaddmain {
            margin: 0;
            padding: 0;
        }

        .bookaddheader {
            margin: 0;
            padding: 0;

        }

        .booaddcontainer {
            margin: 23px 120px
        }
    </style>
</head>

<body class="bookbody">
    <div class="bookaddmain">
        <div class="bookaddheader">
            <?php include 'adminheader.php';?>
        </div>
        <div class="booaddcontainer">
            <div class="err" style=" color: red;">
                <?php echo $err; ?>
            </div>
            <form action="Bookadd.php" method="post">
                <div class="bookaddbox">
                    <div class="level">
                        <label for="type">General_type:</label>
                        <input type="text" name="booktype" id="type" placeholder="type of book">
                    </div>
                    <div class="level">
                        <label for="specefic_type">Specefic_type:</label>
                        <input type="text" name="bookname" id="specefic_type" placeholder="specefic_type">
                    </div>
                    <div class="level">
                        <label for="title">TitleBook:</label>
                        <input type="text" name="title" id="title" placeholder="titleBook">
                    </div>
                    <div class="level">
                        <label for="author">Author:</label>
                        <input type="text" name="author" id="author" placeholder="author">
                    </div>
                    <div class="level">
                        <label for="ISBN">ISBN:</label>
                        <input type="text" name="ISBN" id="ISBN" placeholder="ISBN number">
                    </div>
                    <div class="level"> <label for="publication_date">Publication_date:</label>
                        <input type="date" name="publication_date" id="publication_date" placeholder="publication_date">
                    </div>
                    <div class="level">
                        <label for="revised_date">Revised_date:</label>
                        <input type="date" name="revised_date" id="revised_date" placeholder="revised date">
                    </div>
                    <div class="level">
                        <label for="page_number">Page_number:</label>
                        <input type="number" name="page_number" id="page_number" min="1">
                    </div>
                    <div class="level">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" min="1">
                    </div>
                    <div class="level">
                        <label for="currency">Currency:</label>
                        <input type="text" name="currency" id="currency">
                    </div>
                    <div class="level">
                        <label for="image">Image : </label>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
                    </div>
                    <div class="submit">
                        <input type="submit" name="btn" value="submit">
                    </div>
                </div>
            </form>
        </div>

        <div class="bookaddfoot">
            <?php include 'footer.php'; ?>
        </div>
    </div>
</body>

</html>