<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../includes/head.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Assign Teacher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<?php include '../connection.php'; ?>

<?php 
    $id = $_REQUEST['id'];
    $query = "select * from course_assign where id = $id";
    $sql = mysqli_query($conn, $query);
    $teacher = mysqli_fetch_array($sql);
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
                        <h1 class="mt-4"> Edit Assign Teacher</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Assign Teacher</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Edit Assign Teacher
                            </div>
                            <div class="card-body">
                               <form method="post" action="">
                                   
                                    <div class="form-group">
                                        <label for="">Teacher</label>
                                        <select class="form-control" name="teacher" id="">
                                            <option value="">Select</option>
                                            <?php 
                                                $str = "SELECT `id`,`name`FROM `users`";
                                                $results = mysqli_query($conn, $str);
                                                while($row = mysqli_fetch_array($results)) { ?>
                                                    <option <?php echo ($row['id']==$teacher['teacher_id']) ? 'selected' : '' ?>   value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Course</label>
                                        <select class="form-control" name="course" id="">
                                            <option value="">Select</option>
                                            <?php 
                                                $str = "SELECT `id`,`short_code`FROM `courses`";
                                                $results = mysqli_query($conn, $str);
                                                while($row = mysqli_fetch_array($results)) { ?>
                                                    <option <?php echo ($row['id']==$teacher['course_id']) ? 'selected' : '' ?>   value="<?php echo $row['id'] ?>"><?php echo $row['short_code'] ?></option>
                                                <?php }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for=""> Session </label>
                                        <select class="form-control" name="session" id="">
                                            <option value="">Select</option>
                                            <?php 
                                                $str = "SELECT `id`,`title`FROM `sessions`";
                                                $results = mysqli_query($conn, $str);
                                                while($row = mysqli_fetch_array($results)) { ?>
                                                    <option <?php echo ($row['id']==$teacher['session_id']) ? 'selected' : '' ?>   value="<?php echo $row['id'] ?>"><?php echo $row['title'] ?></option>
                                                <?php }
                                            ?>
                                        </select>
                                    <div class="form-group">
                                        <label for="">Section</label>
                                        <select class="form-control" name="section" id="">
                                            <option value="">Select</option>
                                            <?php 
                                                $str = "SELECT `id`,`title`FROM `sections`";
                                                $results = mysqli_query($conn, $str);
                                                while($row = mysqli_fetch_array($results)) { ?>
                                                    <option <?php echo ($row['id']==$teacher['section_id']) ? 'selected' : '' ?>   value="<?php echo $row['id'] ?>"><?php echo $row['title'] ?></option>
                                                <?php }
                                            ?>
                                        </select>
                                       <div class="mt-2">
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Update Teacher">

                                        <a class="btn btn-danger" href="/project/assign/assignlist.php">List of All Assign Teacher</a>
                                    </div>
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
        $section = $_POST['section'];
        $session = $_POST['session'];
        $teacher  = $_POST['teacher'];
        $course  = $_POST['course'];
      
        $str = "UPDATE `course_assign` SET course_id = $course, teacher_id = $teacher,
        section_id = $section, session_id = $session  WHERE id = $id";
        //echo $str;
        //die();
        if(mysqli_query($conn, $str)) {
            
            header('Location: /project/assign/assignlist.php');
            // echo 'Successfully Inserted';
        }
   }

?>