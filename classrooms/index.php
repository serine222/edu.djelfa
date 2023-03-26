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
                        <h4> المستوى
                            <a href="class-create.php" class="btn btn-primary float-end">اضافة مستوى </a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم المستوي   </th>
                                    <th>اسم المرحلة</th>
                                    <th>العمليات</th>

                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM classrooms";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $class)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $class['classroom_id']; ?></td>
                                                <td><?= $class['Name_Class']; ?></td>
                                                <?php
                                                $Grade_id = $class['Grade_id'];
                                                $query = "SELECT * FROM Grades WHERE Grade_id='$Grade_id' ";
                                               $query_run = mysqli_query($con, $query);
                                               if(mysqli_num_rows($query_run) > 0)
                                                    {
                                                        $Grade = mysqli_fetch_array($query_run);
                                                        ?>


                                                <td><?=$Grade['Grade_Name']; ?></td>

                                                <?php
                                                    }
                                                    else
                                                    {
                                                        echo "<h4>No Such Id Found</h4>";
                                                    }

                                                ?>
                                              
                                                <td>
                                                    <a href="class-view.php?classroom_id=<?= $class['classroom_id']; ?>" class="btn btn-info btn-sm">تفاصيل</a>
                                                    <a href="class-edit.php?classroom_id=<?= $class['classroom_id']; ?>" class="btn btn-success btn-sm">تعديل</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_class" value="<?=$class['classroom_id'];?>" class="btn btn-danger btn-sm">حذف</button>
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