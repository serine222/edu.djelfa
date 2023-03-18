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
                        <h4>sections  View Details 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id_sections']))
                        {
                            $id_sections = mysqli_real_escape_string($con, $_GET['id_sections']);
                            $query = "SELECT * FROM sections WHERE id_sections='$id_sections' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $section = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>section Name</label>
                                        <p class="form-control">
                                            <?=$section['sections'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <p class="form-control">
                                            <?=$section['Status'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>title</label>
                                        <p class="form-control">
                                            <?=$section['title'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>classroom</label>
                                        <p class="form-control">
                                            <?=$section['classroom_id'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Grade</label>
                                        <p class="form-control">
                                            <?=$section['Grade_id'];?>
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