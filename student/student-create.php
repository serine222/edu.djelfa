<?php
session_start();
require '../dbcon.php';
?>
<?php include '../components/head.php';?>

<body>
   <?php include '../components/header.php';?>
   <div class="container bg-white col-xl-10 col-sm-12">
        <?php include('message.php'); ?>
        <div class="card shadow m-5">
            <div class="card-header">
               <div class="justify-content-between d-flex p-2">
                    <h4 class="fw-bold">اضافة الطالب </h4>
                    <a href="index.php" class="btn btn-danger">رجوع  <i class="fa-solid fa-arrow-left"></i></a>
               </div>        
            </div>
            <div class="card-body">
                <form class="form" action="code.php" method="POST">
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label>اسم الطالب</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>البريد الالكتروني</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>رقم الهاتف</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label >المستوى الدراسي</label>
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
                                            echo "<h5> No Such Id Found </h5>";
                                        }
                                    ?>
                            </select>
                        </div>
                   </div> <hr>
                   <button type="submit" name="save_student" class="btn">حفظ البيانات</button>
                   <a href="#" class="btn">الغاء</a>
                </form>
            </div>
        </div>        
   </div>
    
    <?php include '../components/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

