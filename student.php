<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<?php include 'connection.php'; ?>
<body>
    <div class="container">
        <div>
            <h2>Create Student</h2>
        </div>

        <div class="row">
            <div class="col-md-8">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="">Student Name</label>
                        <input type="text" class="form-control" name="name" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Roll</label>
                        <input type="text" class="form-control" name="roll" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" id="">
                    </div>


                    <div class="form-group">
                        <input class="btn btn-warning" type="submit" name="submit" value="Add Student">
                        
                        
                        <a class="btn btn-dark" href="students.php">List All Students</a>
                    
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
   
    $str = "INSERT INTO student (name, email, roll, dob)
            VALUES ('".$name."', '".$email."', '".$roll."', '".$dob."')";
    if(mysqli_query($conn, $str)) {
        header('Location: students.php');
        // echo 'Successfully Inserted';
    }
   }

?>
