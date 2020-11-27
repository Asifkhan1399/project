<?php 
    session_start();
    $id=$_SESSION['userid'];
    echo $id;
    //authorization
    if(!$_SESSION['userid']){
      //session_destroy();
      header('Location: /project/index.php');
    }
    else if($_SESSION['userid'] && $_SESSION['role'] != 'student'){
      //session_destroy();
      header('Location: student-index.php');
    }
?>
<!--?php
   session_start();
   if($_SESSION['student_login_status']!="loged in" and ! isset($_SESSION['userid']) )
    header("Location: index.php");
?-->
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
                        <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-6">
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
                                   <label for=""><b>All Courses</b></label><br>

                                        <?php 
                                            $str = "SELECT * from courses";
                                            $results = mysqli_query($conn, $str);
                                            while($row = mysqli_fetch_array($results)) { ?>
                                               <input name="course_id[]" type="checkbox" value="<?php echo $row['id']; ?>">
                                                <?php echo $row['short_code']." -- ".$row['course_type']." -- ".$row['credit']?>
                                            <select class="form-control" name="section_id[]" id="">
                                                <option value="">Select</option>
                                               <?php 
                                                  $str1 = "SELECT * from sections";
                                                  $results1 = mysqli_query($conn, $str1);
                                                  while($row1 = mysqli_fetch_array($results1)) { ?>
                                                  <option value="<?php echo $row1['id']; ?>"><?php echo $row1['title'] ?></option>
                                               <?php }
                                            ?>
                                            </select>
                                            <?php }
                                        ?>
                                   </div>

                                   <div class="form-group">
                                        <input type="submit" value="Enroll" name="submit" class="btn btn-danger">
                                        <a class="btn btn-dark" href="/project/enroll/elist.php">Enrolled Details</a>
                                   </div>
                               </form>
                            </div>
                        </div>
                        </div>
                        <div class="col-3">
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
include '../includes/connection.php';
if(isset($_POST['submit'])) {
  $session_id = $_POST['session_id'];
  $course_ids = $_POST['course_id'];
  $section_ids = $_POST['section_id'];
  $course_len = count($course_ids);
  for($i=0; $i<$course_len ; $i++)
   {
      $course_id = $course_ids[$i];
      $section_id = $section_ids[$i];
    //   $student_id = $_POST['student_id'];

      $str = "INSERT INTO enrolls (session_id, course_id, student_id, section_id) VALUES ($session_id, $course_id, $id, $section_id)";
     (mysqli_query($conn, $str));
    }  
        //header('Location: enroll/elist.php');
        echo 'Inserted Successfully!';
    
}
?>