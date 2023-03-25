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
                        <h4>Class View Details 
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
                                
                                    <div class="mb-3">
                                        <label>classrooms Name</label>
                                        <p class="form-control">
                                            <?=$classrooms['Name_Class'];?>
                                        </p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>classrooms Email</label>
                                        <p class="form-control">
                                            <?=$classrooms['Grade_id'];?>
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


    
</body>
</html>