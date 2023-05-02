<?php
require '../dbcon.php';
?>
<?php include '../components/head.php';?>
<body>
    <?php include '../components/header.php';?>
    <div class="container bg-white col-xl-10 col-sm-12">
        <div class="card shadow m-5">
           <div class="card-header">
                        <div class="justify-content-between d-flex p-2">
                           <h4 class="fw-bold">معلومات الطالب </h4>
                           <a href="index.php" class="btn btn-danger">رجوع  <i class="fa-solid fa-arrow-left"></i></a>
                       </div>
           </div>      
           <div class="card-body">
                <form class="form">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM students WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                        ?>
                                
                                    <div class="mb-3">
                                        <label>اسم الطالب</label>
                                        <p class="form-control">
                                            <?=$student['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>البريد الكتروني</label>
                                        <p class="form-control">
                                            <?=$student['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>الهاتف</label>
                                        <p class="form-control">
                                            <?=$student['phone'];?>
                                        </p>
                                    </div>
                               <?php
                                                $classroom_id = $student['classroom_id'];
                                                $query = "SELECT * FROM classrooms WHERE classroom_id='$classroom_id' ";
                                               $query_run = mysqli_query($con, $query);
                                               if(mysqli_num_rows($query_run) > 0)
                                                    {
                                                        $class = mysqli_fetch_array($query_run);
                                                        ?>
                                                        <div class="mb-3">
                                                        <label>المستوى الدراسي</label>
                                                        <p class="form-control">
                                                        <?=$class['Name_Class']; ?>
                                                        </p>
                                                        </div>

                                                <?php
                                                    }
                                                    else
                                                    {
                                                        echo "<h4>No Such Id Found</h4>";
                                                    }
                                                
                                                ?>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                </form>        
           </div>
        </div>
    </div>

    <?php include '../components/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>