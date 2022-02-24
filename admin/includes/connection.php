<?php
   $conn = mysqli_connect('localhost', 'root', '', 'news24');

   if($conn){
    //    echo 'Database is connected';
   }else{
       die('Database connection error!'.mysqli_error($conn));
   }

?>