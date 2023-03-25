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
                        <h4>teacher Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $teacher_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM teachers WHERE id_teacher='$teacher_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $teacher = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id_teacher" value="<?= $teacher['id_teacher']; ?>">

                                    <div class="mb-3">
                                        <label>teacher Name</label>
                                        <input type="text" name="name" value="<?=$teacher['Name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>teacher Email</label>
                                        <input type="email" name="Email" value="<?=$teacher['Email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>teacher Password</label>
                                        <input type="text" name="Password" value="<?=$teacher['Password'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>teacher Address</label>
                                        <input type="text" name="Address" value="<?=$teacher['Address'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>teacher Joining_Date</label>
                                        <input type="text" name="Joining_Date" value="<?=$teacher['Joining_Date'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_teacher" class="btn btn-primary">
                                            Update teacher
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


