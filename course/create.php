<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../includes/head.php'; ?>
    </head>
    <body class="sb-nav-fixed">
    <?php include '../includes/nav.php'; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php include '../includes/sidebar.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Course</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Create Course</li>
                        </ol>
                       
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Create Course
                            </div>
                            <div class="card-body">
                               <!-- insert your form here -->
                               <form method="post" action="">
                                   <div class="form-group">
                                       <input type="text" placeholder="Enter Course Title" name="course_title" class="form-control" id="">
                                   </div>
                                   <div class="form-group">
                                       <input type="text" placeholder="Enter Course Short Code" name="short_code" class="form-control" id="">
                                   </div>
                                   <div class="form-group">
                                       <select name="course_type" id="" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="Theory">Theory</option>
                                            <option value="Lab">Lab</option>
                                        </select>
                                   </div>
                                   
                                   <div class="form-group">
                                        <select name="credit" id="" class="form-control">
                                            <option value="">Select Credit</option>
                                            <option value="1">1</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                   <div class="form-group">
                                        <input type="submit" value="Create" name="submit" class="btn btn-warning">
                                        <a class="btn btn-dark" href="/project/course/list.php">List of All Courses</a>
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
    </body>
</html>
<?php 
    include '../connection.php';
    if(isset($_POST['submit'])) {
      
      $course_title = $_POST['course_title'];
      $short_code = $_POST['short_code'];
      $course_type = $_POST['course_type'];
      $credit = $_POST['credit'];
      $str = "INSERT INTO courses (course_title, short_code, course_type, credit) VALUES ('".$course_title."', '".$short_code."', '".$course_type."', '".$credit."')";
      mysqli_query($conn, $str);
    }

?>
