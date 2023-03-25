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
                        <h4>class Add 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST">
           
                            <div class="mb-3">
                                <label>Class Name</label>
                                <input type="text" name="Name_Class" class="form-control">
                            </div>

                                <div class="mb-3">
                                <label for="Name_en"
                                class="mr-sm-2">Name Grade
                                :</label>

                            <div class="mb-3">
                                <select class="fancyselect" name="id-Grade">
                                    
                                <?php 
                                    $query = "SELECT * FROM grades";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $Grade)
                                        {
                                            ?>
                                <option value='<?= $Grade['Grade_id']; ?>'><?= $Grade['Grade_Name']; ?> </option>

                                <?php      }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>

                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_class" class="btn btn-primary">save class</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../components/footer.php';?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>