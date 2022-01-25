<?php

// include "connection.php";

// delete function for files or images
function delete_files($table,$key,$del_id,$files,$folder_name){
    global $conn;

    $del_user = "SELECT $files FROM $table WHERE $key='$del_id'";
    $result = mysqli_query($conn, $del_user);
    while($row =mysqli_fetch_assoc($result)){
        $u_image =$row[$files];
    }
    unlink('assets/images/'.$folder_name.'/'.$u_image);
}

// delete functions for data
function delete($table,$key,$del_id,$redirect){

	global $conn;

	$delete_query = "DELETE FROM $table where $key = '$del_id'";
    $result = mysqli_query($conn, $delete_query);
    if($result){
        header('Location: '.$redirect);
    }else{
        die('delete error.'.mysqli_error($conn));
    }

}

?>