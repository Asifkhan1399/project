<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../includes/head.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Section</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<?php include '../connection.php'; ?>
<?php 
    $id = $_REQUEST['id']; 
    $str = "SELECT * from sections WHERE id=$id";
    $result = mysqli_query($conn, $str);
    $section = mysqli_fetch_array($result);
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
                        <h1 class="mt-4"> Edit Section</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Section</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Edit Section
                            </div>
                            <div class="card-body">
                               <!-- insert your form here -->
                               <form method="post" action="">
                                   <div class="form-group">
                        <label for="">Section Title</label>
                        <input type="text" value="<?php echo $section['title'] ?>" class="form-control" name="title" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Section Status</label>
                        <input type="text" value="<?php echo $section['status'] ?>" class="form-control" name="status" id="">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Update Section">

                        <a class="btn btn-danger" href="/project/section/list.php">List of All Section</a>
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
      $title = $_POST['title'];
      $status = $_POST['status'];
    
    $str = "UPDATE sections SET title='".$title."', status='".$status."'
    WHERE id= $id";
    if(mysqli_query($conn, $str)) {
        header('Location: /project/section/list.php');
        // echo 'Successfully Inserted';
    }
   }

?>