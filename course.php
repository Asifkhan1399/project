<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
.container {
  background-color: #20B2AA;
  background-repeat: no-repeat;	
  background-size: cover;
  border-radius: 5px;
  padding: 50px;
  width: 100%;
}
.card-header{
    font-family:'Open Sans' , sans-serif;
    font-size: 40px;
    font-weight: 600;
    color: #000000;
    margin-top: 5%;
    text-align: center;
    letter-spacing: 4px;
}
</style>
</head>
<body>
<div class="container">
<div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Create Courses</div>
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="#">

                                    <div class="form-group">
                                        <label for="course_title" class="cols-sm-2 control-label">Course Title</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="course_title" id="course_title" placeholder="Enter your Course Title" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_code" class="cols-sm-2 control-label">Course Short Code</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="short_code" id="short_code" placeholder="Enter your Course Short Code" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="course_type" class="cols-sm-2 control-label">Course Type</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                            <select name="course_type" id="course_type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="">Theory</option>
                                            <option value="">Lab</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="credit" class="cols-sm-2 control-label">Course Credit</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                            <select name="credit" id="credit" class="form-control">
                                            <option value="">Select Credit</option>
                                            <option value="">1</option>
                                            <option value="">1.5</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <input type="submit" class="btn btn-info btn-lg btn-block login-button" name="submit" value="ADD Course"></input>
                                    </div>
                                    <div class="login-register">
                                    <a class="btn btn-dark btn-lg btn-block login-button" href="courses.php">List All Courses</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>
</body>
</html>
<?php
    include 'connection.php';
    if(isset($_POST['submit'])){
    //receive data from the input controls
        $course_title = $_POST['course_title'];
        $short_code = $_POST['short_code'];
        $course_type =$_POST['course_type'];
        $credit =$_POST['credit'];
    //database connection
    $str = "INSERT INTO course (course_title, short_code, course_type, credit)
			VALUES ('".$course_title."', '".$short_code."' , '".$course_type."', '".$credit."')";
	
	if(mysqli_query($conn, $str)){
        header('Location: courses.php');
        //echo 'Successfully Inserted';
    }
}
 ?>