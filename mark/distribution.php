<?php 
    session_start();
    //authorization
    if(!$_SESSION['username']){
      session_destroy();
      header('Location: /project/index.php');
    }
    else if($_SESSION['username'] && $_SESSION['role'] != 'teacher'){
      session_destroy();
      header('Location: /project/teacher-index.php');
    }
?>
<?php include '../connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../includes/head.php'; ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
        .cls{
            margin-bottom: 1rem;
        }
        </style>
    </head>
    <body class="sb-nav-fixed">
    <?php include '../includes/nav.php'; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php include '../includes/teacher-sidebar.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Assign Mark Distribution</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Assign Mark Distribution</li>
                        </ol>
                       
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Assign Mark Distribution
                            </div>
                            <div class="card-body">
                               <!-- insert your form here -->
                               <form method="post" action="distribution.php">
                                  
                                   <div class="form-group">
                                   <label for="">SELECT Course</label>
                                   <select class="form-control" name="course" id="course">
                                        <option value="">Select</option>
                                            <?php
                                        
                                                $teacher_id = $_SESSION['id'] ;
                                                $query1 = "SELECT * FROM `course_assign` WHERE teacher_id = $teacher_id";
                                                $sql1 = mysqli_query($conn, $query1);
                                                while($row1 = mysqli_fetch_array($sql1)){ 
                                                    if($row1['status'] == 0){
                                                
                                                    $course_id = $row1['course_id'];
                                                    $query2 = "SELECT * from courses WHERE id = $course_id";
                                                    $sql2 = mysqli_query($conn, $query2);
                                                    $row2 = mysqli_fetch_assoc($sql2);
                                                    
                                                    $section_id = $row1['section_id'];
                                                    $query22 = "SELECT * from sections WHERE id = $section_id";
                                                    $sql22 = mysqli_query($conn, $query22);
                                                    $row22 = mysqli_fetch_assoc($sql22);
                                                    ?>
                                                    <option value="<?php echo $row2['id']; ?>"><?php echo $row2['short_code']." - ".$row22['title']; ?></option>
                                                    <?php 
                                                    }
                                                }
                                        ?>
                                    </select>
                                    
                                    <div class="form-group mt-4">
                                            <button id='add_btn' class="btn btn-warning">Add Category</button>
                                    </div>
                                    <div id="dynamic_row"class="form-group row "> </div>
                                    
    
                                    <div class="form-group">
                                            <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-danger">
                                            <a class="btn btn-dark" href="/project/mark/show.php">Show</a>
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include '../includes/footer.php'; ?>
            </div>
        </div>
       <?php include '../includes/scripts.php'; ?>
       <script>
        $(document).ready(function() {
           $("#add_btn").hide();

                $("#course").change(function() {
                    var course = $("#course").val();
                    if(course != "") {
                        $("#add_btn").show();
                    }
                    else{
                        $("#add_btn").hide();
                    }
                });

               // $("#session").change(function() {
                   // var session_name = $("#session").val();
                    //if(session_name != "") {
                   //     $("#add_btn").show();
                   // }
                   // else{
                  //      $("#add_btn").hide();
                   // }
               // });

               // $("#teacher").change(function() {
                   // var teacher_name = $("#teacher").val();
                    //if(teacher_name != "") {
                    //    $("#add_btn").show();
                    //}
                   // else{
                    //    $("#add_btn").hide();
                    //}
               // });
              
               $("#add_btn").click(function(e) {
                   e.preventDefault();
                   var str = '<div class="col-md-6 portlets mt-2">\
                                <input type="text" name="category_name[]" id="" placeholder="Give catagory" class="form-control">\
                            </div>\
                            <div class="col-md-6 portlets mt-2">\
                                <input type="number" name="category_value[]" id="" placeholder="Give number" class="form-control">\
                            </div>';
                    $("#dynamic_row").append(str);                   
               });
        });
       </script>
    </body>
</html>
<?php 
    if(isset($_POST['submit'])) {
        $course_id = $_POST['course'];
        $query3 = "SELECT * FROM course_assign WHERE course_id = $course_id";
        $sql3 = mysqli_query($conn, $query3);
        $row3 = mysqli_fetch_assoc($sql3);
        $session_id = $row3['session_id'];
        $section_id = $row3['section_id'];
        
        $query4 = "UPDATE `course_assign` SET `status`= 1 WHERE `teacher_id`= $teacher_id AND `course_id`= $course_id";
        mysqli_query($conn, $query4);
        $total = count($_POST['category_name']);
 
        for($i=0; $i < $total ;$i++){
            $category_name = $_POST['category_name'][$i];
            $category_value = $_POST['category_value'][$i];

            $str = "INSERT INTO `distributions`(`course_id`, `session_id`, `teacher_id`, `section_id`, `category_name`, `category_value`) VALUES ($course_id, $session_id,  $teacher_id, $section_id, ' $category_name', $category_value)";
            mysqli_query($conn, $str);
            // echo $str;
            // echo '<br>';
        }
    }
?>
