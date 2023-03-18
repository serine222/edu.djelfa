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
                        <h4>Grade Details
                            <a href="Grades-create.php" class="btn btn-primary float-end">Add Grades</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Grade Name</th>
                                    <th>Grade Note</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM grades";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $Grade)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $Grade['Grade_id']; ?></td>
                                                <td><?= $Grade['Grade_Name']; ?></td>
                                                <td><?= $Grade['Grade_Notes']; ?></td>
                                                
                                                <td>
                                                    <a href="Grades-view.php?id=<?= $Grade['Grade_id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="Grades-edit.php?id=<?= $Grade['Grade_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_Grade" value="<?=$Grade['Grade_id'];?>" class="btn btn-danger btn-sm">Delete</button>
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