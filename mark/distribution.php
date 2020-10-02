<?php include '../connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../includes/head.php'; ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
        .cls{
            margin-bottom: 1rem;
        }
        </style>
    </head>
    <body class="sb-nav-fixed">
    <?php include '../includes/nav.php'; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php include '../includes/teacher-sidebar.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Assign Mark Distribution</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Assign Mark Distribution</li>
                        </ol>
                       
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Assign Mark Distribution
                            </div>
                            <div class="card-body">
                               <!-- insert your form here -->
                               <form method="post" action="">
                                  
                                   <div class="form-group">
                                   <label for="">SELECT Course</label>
                                   <select class="form-control" name="course_id" id="course">
                                        <option value="">Select</option>
                                        <?php 
                                            $str = "SELECT id,short_code from courses";
                                            $results = mysqli_query($conn, $str);
                                            while($row = mysqli_fetch_array($results)) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['short_code'] ?></option>
                                            <?php }
                                        ?>
                                   </select>
                                   <div class="form-group">
                                   <label for="">SELECT Session</label>
                                   <select class="form-control" name="session_id" id="session">
                                   <option value="">Select</option>
                                        <?php 
                                            $str = "SELECT id,title from sessions";
                                            $results = mysqli_query($conn, $str);
                                            while($row = mysqli_fetch_array($results)) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['title'] ?></option>
                                            <?php }
                                        ?>
                                   </select>
                                
                                   <div class="mt-2">
                                        <button id='add_btn' class="btn btn-warning">Add Category</button>
                                   </div>
                                   <div id="dynamic_row"class="form-group row"></div>

                                   <div class="form-group row mt-2">
                                   <div class="col-6">
                                        <input type="text" name="category_name[]" placeholder="Give Category" class="form-control">
                                           </div>
                                        <div class="col-6">
                                        <input type="number" name="category_value[]" placeholder="Give Value" class="form-control">
                                        </div>
                                   </div>
                                
                                   <div class="form-group">
                                        <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-danger">
                                        <a class="btn btn-dark" href="/project/mark/dislist.php">List of All Assign Teacher</a>
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
       <script>
        $(document).ready(function() {
           $("#add_btn").hide();

                $("#course").change(function() {
                    var course_name = $("#course").val();
                    if(course_name != "") {
                        $("#add_btn").show();
                    }
                    else{
                        $("#add_btn").hide();
                    }
                });

                $("#session").change(function() {
                    var session_name = $("#session").val();
                    if(session_name != "") {
                        $("#add_btn").show();
                    }
                    else{
                        $("#add_btn").hide();
                    }
                });
              
               $("#add_btn").click(function(e) {
                   e.preventDefault();
                   var str = '<div class="col-6 cls">\
                                        <input type="text" name="category_name[]" placeholder="Give Category" class="form-control">\
                                        </div>\
                                        <div class="col-6 cls">\
                                        <input type="number" name="category_value[]" placeholder="Give Value" class="form-control">\
                                        </div>';
                    $("#dynamic_row").append(str);                   
               });
        });
       </script>
    </body>
</html>
<?php 
    
    if(isset($_POST['submit'])) {
        
        $course_id = $_POST['course'];
        $session_id = $_POST['session'];
        $total = count($_POST['category_name']);
        for($i=0;$i<$total;$i++){
            $category_name = $POST['category_name'][$i];
            $category_value = $POST['category_value'][$i];
            //insert portion
            $str = "INSERT INTO distributions ( course_id, session_id, category_name, category_value)
                VALUES ($course_id, $session_id, '".$category_name."', $category_value)";
             mysqli_query($conn, $str);
        }

    }

?>
