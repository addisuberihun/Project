<?php      
 session_start();
  $conn=mysqli_connect("localhost","root","","usercontrol");
  if(isset($_SESSION['LOGGEDIN']) && $_SESSION["Role"]=="user"){
     header('location: index.php');
}
     $query = "select * from `booktable`";  
     $run = mysqli_query($conn,$query); 
 
   
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <title>Display data from database</title>  
     <link rel="stylesheet" type="text/css" href="stylsheet_folder/payment.css">  
 </head>  
 <body>  

<?php include 'adminheader.php';?> 



     
<div class="tabledip">
<table border="1" cellspacing="0" cellpadding="0">  
  
  <tr class="heading">  
       <th>No</th>   
       <th>booktype</th>  
       <th>bookname</th>  
       <th>author</th>  
       <th>title</th>  
       <th>ISBN</th>  
       <th>publication_date</th>  
       <th>revised_date</th>  
       <th>volume_page</th>  
       <th>price</th>  
       <th>currency</th> 
  </tr>  
  <?php   
  $i=1;  

       if ($num = mysqli_num_rows($run)>0) {  
            while ($result = mysqli_fetch_assoc($run)) {  
                 echo "  
                      <tr class='data'>  
                          <td>".$i++."</td>  
                           <td>".$result['booktype']."</td>  
                           <td>".$result['bookname']."</td>  
                           <td>".$result['author']."</td>  
                           <td>".$result['title']."</td>  
                           <td>".$result['ISBN']."</td>  
                           <td>".$result['publication_date']."</td> 
                           <td>".$result['revised_date']."</td>  
                           <td>".$result['page_number']."</td>  
                           <td>".$result['price']."</td>  
                           <td>".$result['currency']."</td>  
                           
                      </tr>  
                 ";  
            }  
       }  
  ?>  
 </table> </div> 

     <?php include 'footer.php'; ?> 
    

 </body>  
 </html>  