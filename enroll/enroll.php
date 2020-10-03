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
                                   <label for="">Student ID</label>
                                   <select class="form-control" name="student_id" id="">
                                        <option value="">Select</option>
                                        <?php 
                                            $str = "SELECT id,name from users WHERE role='student'";
                                            $results = mysqli_query($conn, $str);
                                            while($row = mysqli_fetch_array($results)) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>
                                            <?php }
                                        ?>
                                   </select>
                                   <label for="">SELECT Course</label>
                                   <select class="form-control" name="course_id" id="">
                                        <option value="">Select</option>
                                        <?php 
                                            $str = "SELECT id,short_code from courses";
                                            $results = mysqli_query($conn, $str);
                                            while($row = mysqli_fetch_array($results)) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['short_code'] ?></option>
                                            <?php }
                                        ?>
                                   </select>
                                   <div class="form-group">
                                   <label for="">SELECT Session</label>
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
                                   <label for="">SELECT Section</label><br>
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
        
      $course_id = $_POST['course_id'];
      $session_id = $_POST['session_id'];
      $section_ids = $_POST['section_id'];
      $student_id = $_POST['student_id'];
      $section_len = count($section_ids);
      for($i=0; $i<$section_len; $i++){
          $section_id = $section_ids[$i];
          $str = "INSERT INTO enrolls (student_id, course_id, session_id, section_id)
                VALUES ($student_id, $course_id, $session_id, $section_id)";
          mysqli_query($conn, $str);
      }
      header('Location: /project/enroll/elist.php');
    }

?>
