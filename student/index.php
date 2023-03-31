<?php
    session_start();
require '../dbcon.php';

?>

<?php include '../components/head.php';?>


<body>
<?php include '../components/header.php';?>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>
<div class='container'>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>طالب 
                            <a href="student-create.php" class="btn btn-primary float-end">اضافة طالب </a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم الطالب</th>
                                    <th>بريد الالكتروني</th>
                                    <th>الهاتف</th>
                                    <th>العمليات</th>
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
                                                <td><?= $student['id']; ?></td>
                                                <td><?= $student['name']; ?></td>
                                                <td><?= $student['email']; ?></td>
                                                <td><?= $student['phone']; ?></td>
                                               
                                                <td>
                                                    
                                                    
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="student-view.php?id=<?= $student['id']; ?>"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات الطالب</a>
                                                            <a class="dropdown-item" href="student-edit.php?id=<?= $student['id']; ?>"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات الطالب</a>
                                                            <a class="dropdown-item" href="online_classes.php?id=<?= $student['id']; ?>"><i class="fa fa-desktop" aria-hidden="true"></i>   حصص الخاصة بهذا الطالب</a>
                                                            <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="dropdown-item"><i style="color: red" class="fa fa-trash"></i>&nbsp; حذف بيانات الطالب</button>
                                                    </form>

                                                           
                                                        </div>
                                                    </div>



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
    </div>
     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include '../components/footer.php';?>
</body>
</html>