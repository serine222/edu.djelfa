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
                   <h4 class="fw-bold">اضافة استاذ</h4> 
                   <a href="index.php" class="btn btn-danger">رجوع  <i class="fa-solid fa-arrow-left"></i></a>
               </div>
            </div>
            <div class="card-body">
                <form class="form" action="code.php" method="POST">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>اسم الاستاذ</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>البريد الالكتروني</label>
                            <input type="email" name="Email" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>العنوان</label>
                            <input type="text" name="Address" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>كلمة السر</label>
                            <input type="Password" name="Password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>تاريخ الانضمام</label>
                            <input type="date" name="Joining_Date" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                                <label>مادة التدريس </label>
                                <select class="custom-select" name="id_specialization">
            
                                    <?php 
                                        $query = "SELECT * FROM specializations";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $specialization)
                                            {
                                                ?>
                                    <option value='<?= $specialization['id_specialization']; ?>'><?= $specialization['Name_specialization']; ?> </option>

                                    <?php      }
                                        }
                                        else
                                        {
                                            echo "<h5> No Record Found </h5>";
                                        }
                                    ?>

                                </select>
                        </div>
                        <div class="form-group col-md-6">
                                <label>مستوى التدريس </label>
                                <select class="custom-select" name="classroom_id">
                                    <?php 
                                        $query = "SELECT * FROM classrooms";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $class)
                                            {
                                                ?>
                                    <option value='<?= $class['classroom_id']; ?>'><?= $class['Name_Class']; ?> </option>

                                    <?php      }
                                        }
                                        else
                                        {
                                            echo "<h5> No Record Found </h5>";
                                        }
                                    ?>
                                </select>
                        </div>
                    </div><hr> 
                    <button type="submit" name="save_teacher" class="btn">حفظ</button>
                    <a href="#" class="btn">الغاء</a>    
                </form>
            </div>
        </div>
    </div>

     <!-- Modal -->
   <!-- <div class="modal fade" id="m1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <br><br><br><br><br><br><br>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <img src="img/istockphoto-1164721866-612x612.jpg" alt="" style="width: 28%; margin-right: 200px; padding: 0;">
            <div class="modal-body text-center">
                <h5>خطا , يرجى التاكد من ملا جميع الخانات</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">موافق</button>
            </div>
            </div>
        </div>
   </div> -->
    <?php include '../components/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

