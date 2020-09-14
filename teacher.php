<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.container {
  background-image:url(pic3.jpg);
  background-repeat: no-repeat;	
  background-size: cover;
  border-radius: 5px;
  padding: 118px;
  width: 100%;
}
</style>
</head>
<?php include 'connection.php'; ?>
<body>
<div class="container">   
<div style="background-color:#41aaa2; height:400px; width:400px; border-radius:30px; text-align:center;" class="col-md-offset-4">
<h1 style="text-align:center; padding-top:30px; color:#ffffff;">Create Teachers</h1>
<form method="post" action="">
<div class="col-sm-12" style="padding-top:10px;">
<input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" style="border-radius:15px;">
</div>
<div class="col-sm-12" style="padding-top:10px;">
<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" style="border-radius:15px;">
</div>
<div class="col-sm-12" style="padding-top:10px;">
<input type="text" class="form-control" id="mobileno" placeholder="Enter Mobile No." name="mobileno" style="border-radius:15px;">
</div>
<div class="col-sm-12" style="padding-top:10px;">
<select class="form-control" id="gender"name="gender" style="border-radius:15px;">
                    <option value="">Select Gender</option>
                    <option value="">Male</option>
                    <option value="">Female</option>
                    </select>
</div>
<input type="submit" class="btn btn-primary btn-lg btn-block login-button" name="submit" value="ADD Teacher"></input>
<div class="login-register">
<a class="btn btn-success btn-lg btn-block login-button" href="teachers.php">List All Teachers</a>
</div>
</div>
</form>
</div>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
    //receive data from the input controls
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobileno =$_POST['mobileno'];
        $gender =$_POST['gender'];
    //database connection
    $str = "INSERT INTO teacher (name, email, mobileno, gender)
			VALUES ('".$name."', '".$email."' , '".$mobileno."', '".$gender."')";
	
	if(mysqli_query($conn, $str)){
        header('Location: teachers.php');
        //echo 'Successfully Inserted';
    }
}
 ?>