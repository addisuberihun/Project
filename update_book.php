<?php
$conn=mysqli_connect("localhost","root","","usercontrol");

$err = "";

session_start();
if(isset($_SESSION['LOGGEDIN']) && $_SESSION["Role"]=="user"){
     header('location: index.php');
}
if(isset($_POST['button']) && !empty($_POST['search'])){
$isbn =$_POST['search'];
$query = "select * from `booktable` where ISBN='$isbn'";  
$run = mysqli_query($conn,$query); 
$result = mysqli_fetch_assoc($run);
}
else{
    
    if (isset($_GET['id'])) {  
        $id = $_GET['id'];  
        $query = "select * from `booktable` where ISBN='$id'";  
        $result = mysqli_query($conn,$query);  
        // if ($run) {  
        //      header('location: displaybook.php');  
        // }else{  
        //      echo "Error: ".mysqli_error($conn);  
        // }  
   }  
  
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
    // $name = $_POST["name"];
        if(empty($booktype) || empty($bookname) || empty($title) || empty($author) || empty($ISBN) || empty($publication_date) || empty($revised_date) || empty($page_number) || empty($price) || empty($currency)){
            $err = "all data must be full filled";
            }

            else{
                

             $sql="UPDATE `booktable` SET `booktype`='$booktype',`bookname`='$bookname',`title`='$title',`author`='$author',`ISBN`='[value-6]',`publication_date`='$publication_date',`revised_date`='[value-8]',`page_number`='$revised_date',`price`='$price',`currency`='$currency',`photofile`='$image' WHERE ISBN='$ISBN'";
           $upad= mysqli_query($conn,$sql);
           if($upad){
            header('location: displaybook.php');  
           }
           else{
            echo "not updated";
           }
            }
      }
    

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update_book</title>
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

            margin: 23px 280px
        }

        .serch {
            width: 45%;
            border-radius: 10px;
            background-Color: white;
            margin-top: 5%;
            margin-left: 25%;
            padding: 0;
            display: inline-flex;
        }

        .serch input {
            width: 100%;
            border: none;
            outline: none;
            background-Color: white;
        }

        .serch button {
            border: none;
            outline: none;
            background-Color: white;
        }

        .serch button img:hover {
            width: 32px;

            transition: 2s;
        }
    </style>
</head>

<body class="bookbody">
    <div class="bookaddmain">
        <div class="bookaddheader">
            <?php include 'adminheader.php';?>
        </div>
        <form action="update_book.php" method="post">
            <div class="serch">
                <input type="search" name="search" id="" placeholder="Enter ISBN you want to update">
                <button type="submit" name="button"><img src="photo/search.png" height="30" width="30"
                        id="imageform"></button>
            </div>
        </form>
        <div class="booaddcontainer" id="booaddcontainer">
            <div class="err" style=" color: red;">
                <?php echo $err; ?>
            </div>
            <form action="update_book.php" method="post">
                <div class="bookaddbox">
                    <div class="level">
                        <label for="type">General_type:</label>
                        <input type="text" name="booktype" id="type" value='<?php echo $result[' booktype'];?>'>
                    </div>
                    <div class="level">
                        <label for="specefic_type">Specefic_type:</label>
                        <input type="text" name="bookname" placeholder="specefic_type" value='<?php echo $result['
                            bookname'];?>'>
                    </div>
                    <div class="level">
                        <label for="title">TitleBook:</label>
                        <input type="text" name="title" id="titleBook" value='<?php echo $result[' title'];?>'>
                    </div>
                    <div class="level">
                        <label for="author">Author:</label>
                        <input type="text" name="author" id="author" value='<?php echo $result[' author'];?>'>
                    </div>
                    <div class="level">
                        <label for="ISBN">ISBN:</label>
                        <input type="text" name="ISBN" id="ISBN" value='<?php echo $result[' ISBN'];?>'>
                    </div>
                    <div class="level"> <label for="publication_date">Publication_date:</label>
                        <input type="date" name="publication_date" id="publication_date" value='<?php echo $result['
                            publication_date'];?>'>
                    </div>
                    <div class="level">
                        <label for="revised_date">Revised_date:</label>
                        <input type="date" name="revised_date" id="revised_date" value='<?php echo $result['
                            revised_date'];?>'>
                    </div>
                    <div class="level">
                        <label for="page_number">Page_number:</label>
                        <input type="number" name="page_number" id="page_number" min="1" value='<?php echo $result['
                            page_number'];?>'>
                    </div>
                    <div class="level">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" min="1" value='<?php echo $result[' price'];?>'>
                    </div>
                    <div class="level">
                        <label for="currency">Currency:</label>
                        <input type="text" name="currency" value="currency" value='<?php echo $result[' currency'];?>'>
                    </div>
                    <div class="level">
                        <label for="image">Image : </label>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value=""
                            value='<?php echo $result[' image'];?>'>
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
    <script>

        var booaddcontainer = document.getElementById("booaddcontainer");
        var imageform = document.getElementById("imageform");


        imageform.onclick = () => {
            if (booaddcontainer.style.display == "none") {
                booaddcontainer.style.display = "block";
            }

        }


    </script>
</body>

</html>