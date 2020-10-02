<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../includes/head.php'; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All courses</title>
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
            <?php include '../includes/sidebar.php'; ?>
            </div>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">List of All Students</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">All Students</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                List of All Students
                            </div>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                
                <table class="table table-dark table-striped">
                    <thead>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Roll</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php 
                        $str = "SELECT * from users  WHERE role='student'";
                        $results = mysqli_query($conn, $str);
                        while($row = mysqli_fetch_array($results)) {  ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['roll'] ?></td>
                                <td><?php echo $row['password'] ?></td>
                                <td><?php echo $row['role'] ?></td>
                            
                                <td>
                                    <a class="btn btn-primary" href="/project/teacher/edit-student.php?id=<?php echo $row['id'] ?>">Edit</a>
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
                                               Are you sure you want to delete <b><?php echo $row['name'] ?> </b> ? 
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <a href="/project/teacher/delete-student.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Yes</a>
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