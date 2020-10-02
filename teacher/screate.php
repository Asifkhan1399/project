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
            <?php include '../includes/sidebar.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Student</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Create Student</li>
                        </ol>
                       
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Create Student
                            </div>
                            <div class="card-body">
                               <!-- insert your form here -->
                               <form method="post" action="">
                                    <div class="form-group">
                                        <input name="name" placeholder="Enter Student Name" type="text" class="form-control" id="">
                                    </div>
                                   <div class="form-group">
                                         <input type="email" placeholder="Enter Student Email" name="email" class="form-control" id="">
                                   </div>
                                   <div class="form-group">
                                         <input type="roll" placeholder="Enter Student Roll" name="roll" class="form-control" id="">
                                   </div>
                                   <div class="form-group">
                                         <input type="password" placeholder="Enter Student Password" name="password" class="form-control" id="">
                                   </div>
                                   <div class="form-group">
                                         <input type="password" placeholder="Confirm Student Password" name="cpass" class="form-control" id="">
                                   </div>
                                
                                   <div class="form-group">
                                        <input type="submit" value="Create" name="submit" class="btn btn-danger">
                                        <a class="btn btn-dark" href="/project/teacher/slist.php">List of All Students</a>
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
        
      $name = $_POST['name'];
      $email = $_POST['email'];
      $roll = $_POST['roll'];
      $password = md5( $_POST['password']);
      $cpass = md5($_POST['cpass']);

      $str = "INSERT INTO users (name, email, roll, password, role) VALUES ('".$name."', '".$email."','".$roll."', '".$cpass."','student')";
      mysqli_query($conn, $str);
    }

?>
