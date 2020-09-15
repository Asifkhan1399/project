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
                        <h1 class="mt-4">Section</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Create Section</li>
                        </ol>
                       
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Create Section
                            </div>
                            <div class="card-body">
                               <!-- insert your form here -->
                               <form method="post" action="">
                                   <div class="form-group">
                                       <input type="text" placeholder="Enter Section Title" name="title" class="form-control" id="">

                                   </div>
                                   <div class="form-group">
                                       <input type="checkbox" checked name="status" id=""> Active
                                   </div>
                                   <div class="form-group">
                                        <input type="submit" value="Create" name="submit" class="btn btn-primary">
                                        <a class="btn btn-info" href="/project/section/list.php">List of All Sections</a>
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
    include '../connection.php';
    if(isset($_POST['submit'])) {
      if($_POST['status'] == "on") {
        $status = true;
      }
      else {
        $status = false;
      }
      $title = $_POST['title'];
      $str = "INSERT INTO sections (title, status) VALUES ('".$title."', $status)";
      mysqli_query($conn, $str);
    }

?>
