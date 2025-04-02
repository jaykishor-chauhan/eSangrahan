<?php

$userName= $_POST["userName"];  
$password = $_POST["password"];  
$con= mysqli_connect('localhost','root','','uid');  
$sql="select * from tab1 where userName='".$userName."' and password='".$password."';";
  #echo $sql;  
  $result=mysqli_query($con,$sql);  
  $resultcheck=mysqli_num_rows($result);  
  if($resultcheck>0)  
  {
  echo 
  '<html> 
  <body> 
  <script> location.replace("index2.html"); 
  </script> 
  </body> 
  </html>'; 
  }
  
  else  
  {  
  echo '<!DOCTYPE html>
  <html>    
  <head>        
  <title>My Web page</title>             
  </head>     
  <body>        
  <div class="container">            
  <div class="content">                
  <h1>Details Entered Are Invalid</h1>             
  </div>          
  </div>      
  </body> 
  </html> ';  
  
  
  }  
  mysqli_close($con);
  

  ?>

