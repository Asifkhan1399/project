<?php 
    session_start();
    //authorization
    if(!$_SESSION['username']){
      session_destroy();
      header('Location: /project/index.php');
    }
    else if($_SESSION['username'] && $_SESSION['role'] != 'student'){
      session_destroy();
      header('Location: /project/student-index.php');
    }
?>
<?php include '../connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../includes/head.php'; ?>
    </head>
    <body class="sb-nav-fixed">
    <?php include '../includes/nav.php'; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php include '../includes/student-sidebar.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Enrollment</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Student Enroll</li>
                        </ol>
                       
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Enroll Here
                            </div>
                            <div class="card-body">
                               <!-- insert your form here -->
                               <form method="post" action="">
                                    
                                   <div class="form-group">
                       
                                   <div class="form-group">
                                   <label for=""><b>All Courses</b></label><br>
                            
                                        <?php 
                                            $str = "SELECT * from courses";
                                            $results = mysqli_query($conn, $str);
                                            while($row = mysqli_fetch_array($results)) { ?>
                                               <input name="course_id[]" type="checkbox" value="<?php echo $row['id']; ?>">
                                                <?php echo $row['short_code']." - ".$row['course_type']." - ".$row['credit'] ?><br>
                                            <?php }
                                        ?>
                                   </select>
                                   <div class="form-group">
                                   <label for=""><b>SELECT Session</b></label>
                                   <select class="form-control" name="session_id" id="">
                                   <option value="">Select</option>
                                        <?php 
                                            $str = "SELECT id,title from sessions";
                                            $results = mysqli_query($conn, $str);
                                            while($row = mysqli_fetch_array($results)) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['title'] ?></option>
                                            <?php }
                                        ?>
                                   </select>
                                   <div class="form-group">
                                   <label for=""><b>SELECT Section</b></label><br>
                                        <?php 
                                            $str = "SELECT id,title from sections";
                                            $results = mysqli_query($conn, $str);
                                            while($row = mysqli_fetch_array($results)) { ?>
                                                <input name="section_id[]" type="checkbox" value="<?php echo $row['id']; ?>">
                                                <?php echo $row['title'] ?>
                                            <?php }
                                        ?>
                                    </select>
                       
                                   </div>
                                
                                   <div class="form-group">
                                        <input type="submit" value="Enroll" name="submit" class="btn btn-danger">
                                        <a class="btn btn-dark" href="/project/enroll/elist.php">Enrolled Details</a>
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
        
      $course_len = $_POST['course_id'];
      $course_len = count($course_ids);
      for($i=0; $i<$course_len ; $i++){
      $course_id = $course_ids[$i];
      $session_id = $_POST['session_id'];
      $section_ids = $_POST['section_id'];
      $student_id = $_POST['student_id'];
      $section_len = count($section_ids);
      for($i=0; $i<$section_len; $i++){
          $section_id = $section_ids[$i];
          $str = "INSERT INTO enrolls (student_id, course_id, session_id, section_id)
                VALUES ($student_id, $course_id, $session_id, $section_id)";
          mysqli_query($conn, $str);
      }}
      header('Location: /project/enroll/elist.php');
    }

?>