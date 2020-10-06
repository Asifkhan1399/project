<?php 
    session_start();
    //authorization
    if(!$_SESSION['username']){
      session_destroy();
      header('Location: /project/index.php');
    }
    else if($_SESSION['username'] && $_SESSION['role'] != 'teacher'){
      session_destroy();
      header('Location: /project/teacher-index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../includes/head.php'; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Mark Distribution</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .modal {
            color: #000;
        }
    </style>
</head>
<?php include '../connection.php'; ?>
<body class="sb-nav-fixed">
<?php include '../includes/nav.php'; ?>
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php include '../includes/teacher-sidebar.php'; ?>
            </div>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Mark Distribution</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Mark Distribution</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Show Mark Distribution
                            </div>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                
                <table class="table table-dark table-striped">
                    <thead>
                        <th>ID </th>
                        <th>Course </th>
                        <th>Session</th>
                        <th>Category Name</th>
                        <th>Mark Distribution</th>
                    </thead>

                    <tbody>
                    <?php 
                    $teacher_id = $_SESSION['id'];
                    $query = "SELECT * FROM `distributions` WHERE teacher_id = $teacher_id";
                    $sql = mysqli_query($conn, $query);
                    $i = 1;
                    while($row = mysqli_fetch_array($sql)){ 
                      $course_id = $row['course_id'];
                      $query1= "SELECT * FROM `courses` WHERE id = $course_id";
                      $sql1 = mysqli_query($conn, $query1);
                      $row1 = mysqli_fetch_assoc($sql1);
 
                      $session_id = $row['session_id'];
                      $query2= "SELECT * FROM `sessions` WHERE id = $session_id";
                      $sql2 = mysqli_query($conn, $query2);
                      $row2 = mysqli_fetch_assoc($sql2);
                      ?> 
                      <tr class="active">
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $row1['short_code']; ?> </td>
                        <td> <?php echo $row2['title']; ?> </td>
                        <td> <?php echo $row['category_name']; ?> </td>
                        <td> <?php echo $row['category_value']; ?> </td>
                      </tr>
                      <?php
                      $i++;
                    }
                  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </main>
    <?php include '../includes/footer.php'; ?>
    </div>
    </div>
    <?php include '../includes/scripts.php'; ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
</body>
</html>