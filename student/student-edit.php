<?php
session_start();
require '../dbcon.php';
?>
<?php include '../components/head.php';?>


<body>
    <?php include '../components/header.php';?>

    <div class="container col-xl-10 col-sm-12">
        <?php include('message.php'); ?>
        <div class="card shadow m-5">
           <div class="card-header">
                <div class="justify-content-between d-flex p-2">
                    <h4 class="fw-bold">تعديل معلومات الطالب </h4>
                    <a href="index.php" class="btn btn-danger">رجوع  <i class="fa-solid fa-arrow-left"></i></a>
                </div>
           </div>
           <div class="card-body">
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
                                <form class="form" action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $student['id']; ?>">

                                    <div class="mb-3">
                                        <label>اسم الطالب</label>
                                        <input type="text" name="name" value="<?=$student['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>البريد لاالكتروني</label>
                                        <input type="email" name="email" value="<?=$student['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>رقم الهاتف</label>
                                        <input type="text" name="phone" value="<?=$student['phone'];?>" class="form-control">
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn">
                                            تعديل
                                        </button>
                                    </div>

                                </form>
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
   </div>

    <?php include '../components/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


