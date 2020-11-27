<?php 
    session_start();
    include '../connection.php';
    $teacher_id = $_SESSION['id'] ;
    $session_id = $_REQUEST['session_id'];
    $str = "SELECT course_assign.*, courses.short_code, sections.title as sectitle FROM `course_assign` 
            INNER JOIN courses ON course_assign.course_id=courses.id 
            INNER JOIN sections ON course_assign.section_id=sections.id 
            WHERE `teacher_id` = $teacher_id AND `session_id` = $session_id";

    $query = mysqli_query($conn, $str);
    $data = [];
    while($row = mysqli_fetch_array($query))
    {
       $data[] = $row;
    }
    echo json_encode($data);
?>
