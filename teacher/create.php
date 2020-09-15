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
                        <h1 class="mt-4">Teacher</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Create Teacher</li>
                        </ol>
                       
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Create Teacher
                            </div>
                            <div class="card-body">
                               <!-- insert your form here -->
                               <form method="post" action="">
                                    <div class="form-group">
                                        <label for="">Enter Name</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                   <div class="form-group">
                                   <label for="">SELECT Teacher</label>
                                   <select class="form-control" name="" id="">
                                        <option value="">Select</option>
                                        <?php 
                                            $str = "SELECT id,name from users WHERE role='teacher'";
                                            $results = mysqli_query($conn, $str);
                                            while($row = mysqli_fetch_array($results)) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>
                                            <?php }
                                        ?>
                                   </select>
                                   <!-- <input type="text" placeholder="Enter Teacher Name" name="name" class="form-control" id=""> -->
                            
                        
                                   </div>
                                   <div class="form-group">
                                   <label for="">Teacher Email</label>
                                   <input type="text" placeholder="Enter Teacher Email" name="email" class="form-control" id="">

                            <?php 
                                $str = "SELECT id,email from users";
                                $results = mysqli_query($conn, $str);
                                while($row = mysqli_fetch_array($results)) { ?>
                                    <?php echo $row['id'] ?>
                                    <?php echo $row['email']?>
                                    <?php }
                            ?>
                       
                                   </div>
                                
                                   <div class="form-group">
                                        <input type="submit" value="Create" name="submit" class="btn btn-danger">
                                        <a class="btn btn-dark" href="/project/teacher/list.php">List of All Teacher</a>
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

      $str = "INSERT INTO users (name, email, role) VALUES ('".$name."', '".$email."','teacher')";
      mysqli_query($conn, $str);
    }

?>
