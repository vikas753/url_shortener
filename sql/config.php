<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'url_shortener');
   $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   if (!$con)
   {
     die('Could not connect: ' . mysqli_error());
   }
   
   mysqli_select_db($con , DB_DATABASE);
   
?>