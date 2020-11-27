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
                            <form method="post" action="distribution.php">

                                <div class="form-group">
                                    <label for="">SELECT Session</label>
                                    <select class="form-control" name="session" id="session">
                                        <option value="">Select</option>
                                        <?php 
                                            $teacher_id = $_SESSION['id'] ; 
                                            $str = "SELECT DISTINCT `session_id` FROM course_assign WHERE teacher_id = $teacher_id";
                                            $result = mysqli_query($conn, $str);
                                            while($row = mysqli_fetch_array($result)) {
                                                
                                                $session_id = $row['session_id'];
                                                $query2 = "SELECT * FROM `sessions` WHERE id = $session_id";
                                                $sql2 = mysqli_query($conn, $query2);
                                                $row2 = mysqli_fetch_assoc($sql2);
                                                ?>
                                                <option value="<?php echo $session_id; ?>"><?php echo $row2['title']; ?></option>
                                                <?php 
                                                }
                                                ?>
                                    </select>

                                    <div class="form-group" id="crs">
                                        <label for="">SELECT Course</label>
                                        <select class="form-control" name="course" id="course">       
                                        </select>  
                                    </div>
                                    <div class="form-group mt-4">
                                        <button name="add_btn" id="add_btn" class="btn btn-warning">Add Category</button>
                                    </div>
                                    <div id="dynamic_row"class="form-group row "> </div>

                                    <div class="form-group">
                                        <div class="alert alert-secondary" id="show_total" role="alert">
                                            <label for=""> Total Marks :</label>
                                            <output id="result"></output>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                    <button name="submit" id="submit" class="btn btn-danger">Submit</button>
                                        <a class="btn btn-dark" href="/project/mark/show.php">Show</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </main>
            <?php include '../includes/footer.php'; ?>
        </div>
    </div>
       <?php include '../includes/scripts.php'; ?>
       
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#show_total').hide();
            $("#add_btn").hide();
            $("#session").change(function() {
                //alert("ok")
                var session = $("#session").val();
            if(session != "") {
                        $("#add_btn").show();
                        $('#show_total').show();
                     }
                     else{
                         $("#add_btn").hide();
                         $('#show_total').hide();
                    }
            
                // alert(session_id);
                //call server and send this selected session_id
                //to fetch all courses under that sessions
                $.ajax({
                    url: "getCourse.php",
                    dataType: 'json',
                    data: {
                        "session_id": session
                    },
                    success: function(response){
                        console.log(response)
                        $("#course").html('<option value="">Select Course</option>');
                            for(i=0 ;i<response.length ;i++){
                                var x = '<option value="'+response[i].course_id+'">'+response[i].short_code+'&emsp;&emsp;&emsp;'+response[i].sectitle+'</option>';
                                $("#course").append(x);
                            }
                        }
                });
            });     
                $("#add_btn").click(function(e) {
                    e.preventDefault();
                    var str = '<div class="col-md-6 portlets mt-2">\
                                    <input type="text" name="category_name[]" id="" placeholder="Give catagory" class="form-control">\
                                </div>\
                                <div class="col-md-6 portlets mt-2">\
                                    <input type="number" name="category_value[]" id="" placeholder="Give number" class="form-control marks">\
                                </div>';
                    $("#dynamic_row").append(str);                   
                });
        });
    </script>
    <script>
        //Dynamic marks calculation :)
        $(document).ready(function(){
        $("#submit").attr("disabled", true);

            $('.form-group').on('input', '.marks', function(){
            var sum = 0;
            $('.form-group .marks').each(function(){
                var input_val = $(this).val();
                if($.isNumeric(input_val)){
                sum += parseInt(input_val);
                }
            });
            $('#result').text(sum+'/100');
            if(sum > 100){ 
                alert('MARKS LIMIT EXCEEDED!');
                $('#submit').prop('disabled', true);
                $('#add_btn').prop('disabled', true);
            }
            else if(sum == 100){ 
                //alert('Submit Now: total marks fixed'); 
                $('#submit').prop('disabled', false);
                $('#add_btn').prop('disabled', true);
            }
            else { 
                $('#submit').prop('disabled', true); 
                $('#add_btn').prop('disabled', false);
            }
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
 
        for($i=0; $i < $total ;$i++){
            $category_name = $_POST['category_name'][$i];
            $category_value = $_POST['category_value'][$i];

            $str = "INSERT INTO `distributions`(`course_id`, `teacher_id`, `session_id`, `section_id`, `category_name`, `category_value`)
            VALUES ($course_id, $teacher_id, $session_id, $section_id '$category_name', $category_value)";
            mysqli_query($conn, $str);
            echo $str;
            // echo '<br>';
        }
    }
?>