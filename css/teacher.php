<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1st Class</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<?php include 'connection.php'; ?>
<body>
    <div class="container">
        <div style="background-color:#41aaa2; height:400px; width:400px; border-radius:30px; text-align:center;" class="col-md-offset-4">
            <h2 style="text-align:center; padding-top:30px; color:#ffffff;">Teacher Info.</h2>

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
                        <label for="">Department</label>
                        <select class="form-control" name="department_id" id="">
                            <?php 
                                $str = "SELECT id,short_code from departments";
                                $results = mysqli_query($conn, $str);
                                while($row = mysqli_fetch_array($results)) { ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['short_code'] ?></option>
                                    <?php }
                            ?>
                        </select>
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
    $department_id = $_POST['department_id'];
    $str = "INSERT INTO students (name, email, roll, dob, department_id)
            VALUES ('".$name."', '".$email."', '".$roll."', '".$dob."', $department_id)";
    if(mysqli_query($conn, $str)) {
        header('Location: students.php');
        // echo 'Successfully Inserted';
    }
   }

?>
