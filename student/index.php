<?php
    session_start();
require '../dbcon.php';
?>
<?php include '../components/head.php';?>

<body>
  <?php include '../components/header.php';?>
  <?php include('message.php'); ?>
    <!--student-list-->
    <div class="container bg-white col-xl-10 col-sm-12">
        <div class="student-list">
            <h3 class="text-center mt-5 mb-5 fw-bold">قائمة الطلاب</h3>
            <div class="t-table justify-content-between">
                <h5 class="fw-bold">قائمةالطلاب</h5> 
                <a href="student-create.php"> <button class="btn" id="#btn"><i class="fa-solid fa-plus"></i> اضافة طالب</button></a>
            </div>
            <table class="table table-hover shadow text-center">
                <thead>
                   <tr class="df">
                        <th scope="col">اسم الطالب</th>
                        <th scope="col">البريد الالكتروني</th>
                        <th scope="col">رقم الهاتف</th>
                        <th scope="col">العمليات</th>                     
                   </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM students";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $student)
                            {
                                ?>
                                <tr>
                                    <!-- <td><?= $student['id']; ?></td> -->
                                    <td><?= $student['name']; ?></td>
                                    <td><?= $student['email']; ?></td>
                                    <td><?= $student['phone']; ?></td>
                                    <td>
                                                                <div class="dropdown show">
                                                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        العمليات
                                                                    </a>
                                                                    <div class="form dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                        <a class="dropdown-item" href="student-view.php?id=<?= $student['id']; ?>"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات الطالب</a>
                                                                        <a class="dropdown-item" href="student-edit.php?id=<?= $student['id']; ?>"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات الطالب</a>
                                                                        <a class="dropdown-item" href="online_classes.php?id=<?= $student['id']; ?>"><i class="fa fa-desktop" aria-hidden="true"></i>  الحصص الخاصة بالطالب</a>
                                                                        <form action="code.php" method="POST" class="d-inline">
                                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="dropdown-item"><i style="color: red" class="fa fa-trash"></i>&nbsp; حذف بيانات الطالب</button>
                                                                        </form>  
                                                                    </div>
                                                                </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<h5> لا يوجد سجلات </h5>";
                        }
                    ?>
                </tbody>                 
            </table>
        </div> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include '../components/footer.php';?>
</body>
</html>