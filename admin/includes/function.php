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

// find name from id
function find_name($p_title,$posts,$p_id,$post_id){

    global $conn;

    $author_name_sql = "SELECT $p_title FROM $posts WHERE $p_id='$post_id'";
    $result_u = mysqli_query($conn, $author_name_sql);
    $row = mysqli_fetch_array($result_u);
    $name = $row[$p_title];
    
    echo $name;
}

// find image url/name from post id
function find_img($image,$posts,$p_id,$post_id){

    global $conn;

    $author_name_sql = "SELECT $image FROM $posts WHERE $p_id='$post_id'";
    $result_u = mysqli_query($conn, $author_name_sql);
    $row = mysqli_fetch_array($result_u);
    $name = $row[$image];
    
    return $name;
}




?>