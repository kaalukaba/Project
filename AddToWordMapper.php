 <html>
 <head>  
 <meta name="viewport" content="width=device-width, initial-scale=1">  
 <title> MapperEntry </title> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> 
 <script>
 $( "#header-plugin" ).load( "https://vivinantony.github.io/header-plugin/", function() {
   $("a.back-to-link").attr("href", "https://thelittletechie.blogspot.com/2014/09/how-to-place-text-or-icons-inside.html#tlt")  
 });
 </script>
 <style>   
 Body {  
   font-family: Calibri, Helvetica, sans-serif;  
   background-color: pink;  
 } 
   .navbar {
   width: 100%;
   background-color: #555;
   overflow: auto;
 }

 /* Navbar links */
 .navbar a {
   float: left;
   text-align: center;
   padding: 12px;
   color: white;
   text-decoration: none;
   font-size: 17px;
 }

 /* Navbar links on mouse-over */
 .navbar a:hover {
   background-color: #000;
 }

 /* Current/active navbar link */
 .active {
   background-color: #04AA6D;
 }

 /* Add responsiveness - will automatically display the navbar vertically instead of horizontally on screens less than 500 pixels */
 @media screen and (max-width: 500px) {
   .navbar a {
     float: none;
     display: block;
   }
 } 
 button:hover 
 {   
        opacity: 0.6;   
 } 
.container 
{   
       padding: 25px;   
       background-color: lightblue; 
       font-size: 100px; 
} 
button 
{   
       background-color: #4CAF50;   
       width: 100%;  
       color: orange;   
       padding: 15px;   
       margin: 10px 0px;   
       border: none;   
       cursor: pointer;   
}  

form 
{   
        border: 3px solid #f1f1f1;   
}   

input[type=text]
{   
       width: 100%;   
       margin: 8px 0;  
       padding: 12px 20px;   
       display: inline-block;   
       border: 2px solid green;   
       box-sizing: border-box;   
}  
</style>

<body>
<div class="navbar" align="center">
      <a class="active" href="HomePage.html"><i class="fa fa-fw fa-home" style='font-size:100px;'></i>Home</a>
      <a href="FruitsMenu.html"><i class="fas fa-apple-alt" style='font-size:100px;'></i>Fruits</a>
      <a href="VegetablesMenu.html"><i class="fas fa-carrot" style='font-size:100px;'></i> Vegetables</a>
      <a href="FlowerMenu.html"><i class="fas fa-seedling" style='font-size:100px;'></i>Flower</a>
      <a href="TreeMenu.html"><i class="fas fa-cannabis" style='font-size:100px;'></i>Trees</a>
    </div>  
    <br>   
    <center> <h1> Word Mapper For Fruits/Vegetables/Flower/Trees </h1> </center>   
          <div>                
                <form action="" method="POST" enctype="multipart/form-data">  
                <div class="container">   
                       <center><select name="category" style="font-size: xx-large;"></center>
                              <option value="Fruits">Fruits</option>
                              <option value="Vegetables">Vegetables</option>
                              <option value="Flowers">Flowers</option>
                              <option value="Trees">Trees</option>
                       </select>
                      <br>
                     <label style="font-size: xx-large; text-align: left; text-align-last: left;">Name : </label>
                     <input style="font-size: xx-large;" type="text" placeholder="Enter Name" name="EnglishName" required>
                     <input style="font-size: xx-large;" type="file" placeholder="Browse Image" name="image">
                     <button style="font-size: xx-large;" type="submit" name="submitMapper">Submit Mapper</button>    
                 </div>   
             </form>
<?php
       $connection = mysqli_connect("localhost","root","");
       $db = mysqli_select_db($connection,'db_name');

       if(isset($_POST['submitMapper']))
       {
              $image        = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
              $category     = $_POST['category'];
              $englishName  = $_POST['EnglishName'];

              $query        = "INSERT INTO `wordmapper`(`Category`, `EnglishName`, `Image`) 
                               VALUES ('$category', '$englishName', '$image')";

              $query_run    = mysqli_query($connection,$query);

              if($query_run)
              {
                     echo '<script type="text/javascript"> alert("Data Inserted Succefully") </script>';
              }

              else
              {
                     echo '<script type="text/javascript"> alert("Data Insertion Failed") </script>';
              }
       }
?>      
</body>
</head>
</html> 