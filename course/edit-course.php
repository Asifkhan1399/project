<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../includes/head.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1st Class</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<?php include '../connection.php'; ?>
<?php 
    $id = $_REQUEST['id']; 
    $str = "SELECT * from courses WHERE id=$id";
    $result = mysqli_query($conn, $str);
    $course = mysqli_fetch_array($result);
?>
<body  class="sb-nav-fixed">
<?php include '../includes/nav.php'; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php include '../includes/sidebar.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"> Edit Course</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Course</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Edit Course
                            </div>
                            <div class="card-body">
                               <!-- insert your form here -->
                               <form method="post" action="">
                                   <div class="form-group">
                        <label for="">Course Title</label>
                        <input type="text" value="<?php echo $course['course_title'] ?>" class="form-control" name="course_title" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Course Short Code</label>
                        <input type="text" value="<?php echo $course['short_code'] ?>" class="form-control" name="short_code" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Course Type</label>
                        <input type="text" value="<?php echo $course['course_type'] ?>" class="form-control" name="course_type" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Credit</label>
                        <input type="text" value="<?php echo $course['credit'] ?>" class="form-control" name="credit" id="">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Update Course">

                        <a class="btn btn-danger" href="/project/course/list.php">List of All Courses</a>
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
   if(isset($_POST['submit'])) {
    // receive data from the input controls
      $course_title = $_POST['course_title'];
      $short_code = $_POST['short_code'];
      $course_type = $_POST['course_type'];
      $credit = $_POST['credit'];
    
    $str = "UPDATE courses SET course_title='".$course_title."', short_code='".$short_code."', course_type='".$course_type."', credit='".$credit."'
    WHERE id= $id";
    if(mysqli_query($conn, $str)) {
        header('Location: /project/course/list.php');
        // echo 'Successfully Inserted';
    }
   }

?>