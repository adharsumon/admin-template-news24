<?php
   $conn = mysqli_connect('localhost', 'root', '', 'news24');

   if($conn){
    //    echo 'Database is connected';
   }else{
       die('database connection error!'.mysqli_connect($conn));
   }

?>