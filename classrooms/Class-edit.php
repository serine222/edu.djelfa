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
                        <h4>class Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['classroom_id']))
                        {
                            $classrooms_id = mysqli_real_escape_string($con, $_GET['classroom_id']);
                            $query = "SELECT * FROM classrooms WHERE classroom_id='$classrooms_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $classrooms = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="classroom_id" value="<?= $classrooms['classroom_id']; ?>">

                                    <div class="mb-3">
                                        <label>اسم المستوى</label>
                                        <input type="text" name="Name_Class" value="<?=$classrooms['Name_Class'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>اسم المرحلة</label>
                                        <input type="text" name="Grade_id" value="<?=$classrooms['Grade_id'];?>" class="form-control">
                                    </div>
  
                                    <div class="mb-3">
                                        <button type="submit" name="update_class" class="btn btn-primary">
                                           تعديل المستوى
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
    </div>
    <?php include '../components/footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


