<?php include '../includes/head.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../connection.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
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
            <?php include '../includes/student-sidebar.php'; ?>
            </div>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">List of All Enrolled Students</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Enrolled Students</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Enrolled Students
                            </div>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                
                <table class="table table-dark table-striped">
                    <thead>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Session</th>
                        <th>Section</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>

                    <?php 
                        $str = "SELECT en.id, c.course_title as ctitle,
                                c.short_code, u.name as uname, ss.title as sstitle,
                                sc.title as sctitle FROM enrolls as en
                               INNER JOIN courses as c ON en.course_id=c.id
                               INNER JOIN users as u ON en.student_id=u.id
                               INNER JOIN sessions as ss ON en.session_id=ss.id
                               INNER JOIN sections as sc ON en.section_id=sc.id";
                        $results = mysqli_query($conn, $str);
                        while($row = mysqli_fetch_array($results)) { ?>
                            <tr>
                                
                            <td><?php echo $row['uname'] ?></td>
                                <td><?php echo $row['short_code'] ?></td>
                                <td><?php echo $row['sstitle'] ?></td>
                                <td><?php echo $row['sctitle'] ?></td>
                            <td>
                                    <a class="btn btn-primary" href="/project/course/edit-course.php?id=<?php echo $row['id'] ?>">Edit</a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#mm<?php echo $row['id'] ?>">Delete</a>
                                    <div class="modal" id="mm<?php echo $row['id'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Delete Confirmation !!!</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                               Are you sure you want to delete <b><?php echo $row['course_title'] ?> </b> ? 
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <a href="/project/course/delete-course.php?studentid=<?php echo $row['id'] ?>" class="btn btn-success">Yes</a>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>  
                            <?php }
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