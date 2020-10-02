<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../includes/head.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<?php include '../connection.php'; ?>
<?php 
    $id = $_REQUEST['id']; 
    $str = "SELECT * from users WHERE id=$id";
    $result = mysqli_query($conn, $str);
    $teacher = mysqli_fetch_array($result);
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
                        <h1 class="mt-4"> Edit Teacher</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Teacher</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Edit Teacher
                            </div>
                            <div class="card-body">
                               <!-- insert your form here -->
                               <form method="post" action="">
                                   <div class="form-group">
                        <label for="">Teacher Name</label>
                        <input type="text" value="<?php echo $teacher['name'] ?>" class="form-control" name="name" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Teacher Email</label>
                        <input type="text" value="<?php echo $teacher['email'] ?>" class="form-control" name="email" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" value="<?php echo $teacher['password'] ?>" class="form-control" name="password" id="">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Update Teacher">

                        <a class="btn btn-danger" href="/project/teacher/list.php">List of All Teacher</a>
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
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      
    
    $str = "UPDATE users SET name='".$name."', email='".$email."', password='".$password."'
    WHERE id= $id";
    if(mysqli_query($conn, $str)) {
        header('Location: /project/teacher/list.php');
        // echo 'Successfully Inserted';
    }
   }

?>