
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGO</title>
<link rel="stylesheet" type="text/css" href="stylsheet_folder/adimheader.css"> 
<link rel="stylesheet" href="stylsheet_folder/all.css">
<style>
        .them{
            width:150px;
            margin:0;
            padding:0;

        }
        .them input{
            height: 25px;
          width: 80px;
           outline: none;
        }
        .them button{
            background-color: brown;
            border-radius:6px;
            font-size:15px;
            height:30px;
        
        }
        .dropdown-catagories input,button {
    margin-left: -145px;
    margin:3px;
}
        .them button:hover{
            background-color:blue;
        }
        .themchange{
            margin:0;
            padding:0; 
        
        }
    </style>
</head>
<body>
         <div class="container">
           <div class="lgotext">
                <div class="logo">
               <img src="photo/logo.png" height="100" width="100" alt="book store">
                </div>
              <div class="logotext">
               <h1>BRANA BOOK STORE</h1>
                   </div>
        </div>
       <div class="header">
        <ul>
            <li>
                <div class="dropcata">
                <a href="#">Catagories</a>
          
            <ol class="dropdown-catagories">
               <li><a href="fiction.php">fictions books</a></li><br>
                <li><a href="christain.php">christain book</a></li><br>
                <li><a href="muslim.php">muslim book</a></li><br>
                <li><a href="scientific.php">scientific reseach book</a></li><br>
                <li><a href="university.php">university reference</a></li><br>
                <li><a href="prepartory.php">preparatory and high school reference book</a></li>
          </ol>     

 
                </div>
        </li>
 
            <li>  <a href="contact_us.php">Contact</a></li>
            <li>  <a href="#">Aboutus</a></li>
            <li>
                   <div class="dropcata">
                   <a href="#">Add_book</a>
            
                <ol class="dropdown-catagories">
                    <li><a href="Bookadd.php">addbook</a></li>
                    <li><a href="Delete.php">delet_book</a></li>
                    <li><a href="UPDA.php">update_book</a></li>
                    <li><a href="displaybook.php">show_All_books</a></li>
              </ol>
           
         </div>
        </li>
            
            <li><div class="dropcata">
               <img src="photo/threebar.png">
          
             
                  <ol class="dropdown-catagories">
                              <li>
							  <div class="dropcata">
							  <a href="#" id="themlink">themcolor</a>
                            <p class="dropdown-catagories"id="themdiv">
                              <input type="text" id="color">
                               <button onclick="chngecolor()">change</button>
                        
                </p>
						  </div>
                            </li>
                     <li><a href="#">booking</a></li>
                   <li><a href="#">about</a></li>
                  <li><a href="#">infromation</a></li>
                  </ol>           
 
                      </div>
                    </li>

        </ul>
       </div> 
    </div>
    <hr>
    <script>
var themlink = document.getElementById('themlink');
var themdiv = document.getElementById('themdiv');
themlink.onclick =() => {
    if(themdiv.style.display=="none"){
        themdiv.style.display= "block";
        themlink.style.display= "none";
    }
    
}
        function chngecolor() {
            var color = document.getElementById('color').value;

            var body = document.getElementsByTagName('body')[0];
            body.style.backgroundColor = color;
        }
    </script>
</body>
</html>