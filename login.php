<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="/project/css/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="box">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="float">
                        <form class="form" method="post" action="">
                            <div class="form-group">
                                <label for="email" class="text-white">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-warning btn-md" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>
<!-- 
 //if(isset($_POST['submit'])){
   //     $email = $_POST['email'];
     //   $password = md5( $_POST['password']);
       // $str = "SELECT * from users WHERE email ='".$email."' AND password ='".$password."' ";

//       $q = mysqli_query($conn, $str);
  //     $result = mysqli_fetch_array($q);
    //   $role = $result['role'];
       //admin login
      // if($role == 'admin'){
        //$username = $result['name'];
        //$_SESSION['username'] = $username; 
         // $_SESSION['role'] = $role;
          //header('Location: /project/index.php');
      //}
      //teacher login
      else if($role == "teacher"){
          $username = $result['name'];
          $id = $result['id'];
          $_SESSION['username'] = $username; 
          $_SESSION['id'] = $id; 
          $_SESSION['role'] = $role;
        header('Location: /project/teacher-index.php');
      }
      //student login
      else if($role == "student"){
        $userid = $result['id'];
        $_SESSION['username'] = $username; 
        $_SESSION['id'] = $userid; 
        $_SESSION['role'] = $role;
      header('Location: student-index.php');
    }
      else {
        echo "Wrong email or password";
      }
 }
?> -->

<?php
include("connection.php");
if(isset($_POST['login']))
{
	$email = $_POST['email'];
    $password = md5( $_POST['password']);
    $str = "SELECT * from users WHERE email ='".$email."' AND password ='".$password."' ";
    $r=mysqli_query($conn,$str);
    $result = mysqli_fetch_array($r);
    $role = $result['role'];
    if($role == 'admin')
            {
                //$username = $result['name'];
                $id = $result['id'];
                $_SESSION['userid']=$id;
                $_SESSION['role'] = $role;
               //$_SESSION['admin_login_status']="loged in";
                header("Location:index.php");
            }
            
    else if($role == 'teacher')
            {
                //$username = $result['name'];
                $id = $result['id'];
                $_SESSION['userid']=$id;
                $_SESSION['role'] = $role;
                //$_SESSION['teacher_login_status']="loged in";
                header("Location:teacher-index.php");
            }
    else if($role == 'student')
            {
                //$username = $result['name'];
                $id = $result['id'];
                $_SESSION['userid']=$id;
                $_SESSION['role'] = $role;
                //$_SESSION['student_login_status']="loged in";
                header("Location:student-index.php");
            }
    else
            {
                echo "<p style='color: red;'>Incorrect Email or Password</p>";
            }
	
}
?>