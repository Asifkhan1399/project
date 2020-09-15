<?php 
    include '../includes/head.php';
    $id = $_REQUEST['id']; //receive studentid from query parameter
    $str = "DELETE FROM courses where id=$id";
    if(mysqli_query($conn, $str)) {
        header('Location: /project/course/list.php');
    }

?>