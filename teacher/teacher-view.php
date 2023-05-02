<?php
require '../dbcon.php';
?>

<?php include '../components/head.php';?>


<body>
    <?php include '../components/header.php';?>
    <div class="container col-xl-10 col-sm-12">
        <div class="card shadow m-5">
           <div class="card-header">
                <div class="justify-content-between d-flex p-2">
                    <h4 class="fw-bold">معلومات الاستاذ </h4>
                    <a href="index.php" class="btn btn-danger">رجوع  <i class="fa-solid fa-arrow-left"></i></a>
                </div>
           </div> 
           <div class="card-body">
               <form class="form">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $teacher_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM teachers WHERE id_teacher='$teacher_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $teacher = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>اسم الاستاذ</label>
                                        <p class="form-control">
                                            <?=$teacher['Name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>البريد الالكتروني</label>
                                        <p class="form-control">
                                            <?=$teacher['Email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>العنوان</label>
                                        <p class="form-control">
                                            <?=$teacher['Address'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>تاريخ الانضمام </label>
                                        <p class="form-control">
                                            <?=$teacher['Joining_Date'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                    </div>
               </form>
           </div>
       </div>
   </div>
 

    <?php include '../components/footer.php';?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
