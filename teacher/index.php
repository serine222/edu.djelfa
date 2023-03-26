<?php
    session_start();
require '../dbcon.php';

?>

<?php include '../components/head.php';?>


<body>
<?php include '../components/header.php';?>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>الاساتذة
                            <a href="teacher-create.php" class="btn btn-primary float-end">اضافة استاذ جديد</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم الاستاذ</th>
                                    <th>بريد الالكتروني</th>
                                    <th>الموقع السكن</th>
                                    <th>تاريخ البدا العمل</th>
                                    <th>العمليات</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM teachers";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $teacher)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $teacher['id_teacher']; ?></td>
                                                <td><?= $teacher['Name']; ?></td>
                                                <td><?= $teacher['Email']; ?></td>
                                                <td><?= $teacher['Address']; ?></td>
                                                <td><?= $teacher['Joining_Date']; ?></td>
                                                <td>
                                                
                                                  
                                               
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="teacher-view.php?id=<?= $teacher['id_teacher']; ?>"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات الاستاذ</a>
                                                            <a class="dropdown-item" href="teacher-edit.php?id=<?= $teacher['id_teacher']; ?>"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات الاستاذ</a>
                                                           
                                                            <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_teacher" value="<?= $teacher['id_teacher']; ?>" class="dropdown-item"><i style="color: red" class="fa fa-trash"></i>&nbsp; حذف بيانات الاستاذ</button>
                                                    </form>



                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div> 
       <?php include '../components/footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>