<?php
require '../dbcon.php';
?>

<?php include '../components/head.php';?>


<body>
<?php include '../components/header.php';?>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>teacher View Details 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $teacher_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM teachers WHERE id='$teacher_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $teacher = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>teacher Name</label>
                                        <p class="form-control">
                                            <?=$teacher['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>teacher Email</label>
                                        <p class="form-control">
                                            <?=$teacher['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>teacher Phone</label>
                                        <p class="form-control">
                                            <?=$teacher['phone'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>teacher Course</label>
                                        <p class="form-control">
                                            <?=$teacher['course'];?>
                                        </p>
                                    </div>

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