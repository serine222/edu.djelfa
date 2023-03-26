<?php
session_start();
require '../dbcon.php';
?>
<?php include '../components/head.php';?>


<body>
<?php include '../components/header.php';?>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>تعديل 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $Grade_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM Grades WHERE Grade_id='$Grade_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $Grade = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="Grade_id" value="<?= $Grade['Grade_id']; ?>">

                                    
                                    <div class="mb-3">
                                        <label>اسم المستوى</label>
                                        <input type="email" name="Grade_Name" value="<?=$Grade['Grade_Name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                     <label>ملاحظة</label>
                                        <input type="text" name="Grade_Notes" value="<?=$Grade['Grade_Notes'];?>" class="form-control">
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
    </div>
    <?php include '../components/footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


