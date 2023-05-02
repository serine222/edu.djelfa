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
                    <h4 class="fw-bold">تعديل معلومات الاستاذ </h4>
                    <a href="index.php" class="btn btn-danger">رجوع  <i class="fa-solid fa-arrow-left"></i></a>
                </div>
           </div>
           <div class="card-body">
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
                                <form class="form" action="code.php" method="POST">
                                    <input type="hidden" name="id_teacher" value="<?= $teacher['id_teacher']; ?>">

                                    <div class="mb-3">
                                        <label>اسم الاستاذ</label>
                                        <input type="text" name="name" value="<?=$teacher['Name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>البريد الالكتروني</label>
                                        <input type="email" name="Email" value="<?=$teacher['Email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>كلمة السر</label>
                                        <input type="text" name="Password" value="<?=$teacher['Password'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>العنوان </label>
                                        <input type="text" name="Address" value="<?=$teacher['Address'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>تاريخ الانضمام</label>
                                        <input type="text" name="Joining_Date" value="<?=$teacher['Joining_Date'];?>" class="form-control">
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <button type="submit" name="update_teacher" class="btn">
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
    </div>

    <?php include '../components/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


