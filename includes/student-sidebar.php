<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../student-index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Manage Sessions</div> -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#enroll" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Manage Student Enrollment
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="enroll" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/project/enroll/enroll.php">Create Student Enrollment</a>
                                    <a class="nav-link" href="/project/enroll/elist.php">All Student Enrollment</a>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                         <?php
                                    include("connection.php");
                                    
                                    $id=$_SESSION['userid'];
                                    echo $id;
                                    echo '<br>';

                                    $str= "select * from users WHERE id='$id'";
                                    $result= mysqli_query($conn, $str);
                                    $row=mysqli_fetch_array($result);
                                    echo $row['name'] ;
                                    echo '<br>';
                                    echo $row['role'] ;
                        ?>

                        
                    </div>
                    </nav>