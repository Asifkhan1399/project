<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1st Class</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<?php include 'connection.php'; ?>
<?php 
    $student_id = $_REQUEST['id']; 
    $str = "SELECT * from students WHERE id=$student_id";
    $result = mysqli_query($conn, $str);
    $student = mysqli_fetch_array($result);
?>
<body>
    <div class="container">
        <div>
            <h2>Edit Student</h2>
        </div>

        <div class="row">
            <div class="col-md-8">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="">Student Name</label>
                        <input type="text" value="<?php echo $student['name'] ?>" class="form-control" name="name" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" value="<?php echo $student['email'] ?>" class="form-control" name="email" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Roll</label>
                        <input type="text" value="<?php echo $student['roll'] ?>" class="form-control" name="roll" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" value="<?php echo $student['dob'] ?>" class="form-control" name="dob" id="">
                    </div>

                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Update Student">

                        <a class="btn btn-danger" href="students.php">List All Students</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
   if(isset($_POST['submit'])) {
    // receive data from the input controls
    $name = $_POST['name'];
    $email = $_POST['email'];
    $roll = $_POST['roll'];
    $dob = $_POST['dob'];
    
    $str = "UPDATE students SET name='".$name."', email='".$email."', roll='".$roll."', dob='$dob', 
    WHERE id= $student_id";
    if(mysqli_query($conn, $str)) {
        header('Location: students.php');
        // echo 'Successfully Inserted';
    }
   }

?>