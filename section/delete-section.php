
<?php 
    //connection to database
    $conn = mysqli_connect("localhost","root","","project");
        if(!$conn)
        {
            echo "Connection Failed";
        }
        ?><?php 
    include '../includes/head.php';
    $id = $_REQUEST['id']; //receive studentid from query parameter
    $str = "DELETE FROM sections where id=$id";
    if(mysqli_query($conn, $str)) {
        header('Location: /project/section/list.php');
    }

?>