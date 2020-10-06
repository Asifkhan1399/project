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
    <title>All Assign Teacher</title>
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
                        <h1 class="mt-4">List of View All Course</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">View All Course</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                List of View All Course
                            </div>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                
                <table class="table table-dark table-striped">
                    <thead>
                        <th>Teacher </th>
                        <th>Course</th>
                        <th>Session</th>
                        <th>Section</th>
                        
                    </thead>
                    <tbody>
                    <?php 
                        $str = "SELECT ca.id, c.course_title as ctitle,
                                c.short_code, u.name as uname, ss.title as sstitle
                                , sc.title as sctitle FROM course_assign as ca
                                INNER JOIN courses as c ON ca.course_id=c.id
                                INNER JOIN users as u ON ca.teacher_id=u.id
                                INNER JOIN sessions as ss ON ca.session_id=ss.id
                                INNER JOIN sections as sc ON ca.section_id=sc.id";
                        $results = mysqli_query($conn, $str);
                        while($row = mysqli_fetch_array($results)) {
                            if ($row['uname']===$_SESSION["username"]) {
                                  
                                
                            ?>
                           <tr>
                               <td><?php echo $row['uname'] ?></td>
                               <td><?php echo $row['short_code'] ?></td>
                               <td><?php echo $row['sstitle'] ?></td>
                               <td><?php echo $row['sctitle'] ?></td>
                           </tr>  
                           <?php  } }
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