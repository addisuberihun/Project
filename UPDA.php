
<?php      
  $conn=mysqli_connect("localhost","root","","usercontrol");
  $query = "select * from `booktable`";  
  $run = mysqli_query($conn,$query); 
  
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <title>Delete Data From Database in PHP</title>  
     <link rel="stylesheet" type="text/css" href="stylsheet_folder/payment.css">  
     <style>
          body{
               margin:0;
               padding:0;
               background-color: rgb(80, 131, 133);
          }
          .deleteable{
               margin-top:20%;
               margin-bottom: 3%; 
          }
     </style>
 </head>  
 <body>  
<div class="deleteheader">
<?php include 'adminheader.php';?>
</div>

<div class="deleteable">
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
       <th>Operation</th> 
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
                           <td class='delet'><a href='update_book.php?id=".$result['id']."' id='btn'>update</a></td>  
                      </tr>  
                 ";  
            }  
       }  
  ?>  
</table>  
</div>
     
<div class="deletefooter">
<?php include 'footer.php';?>
</div>
 </body>  
 </html>  