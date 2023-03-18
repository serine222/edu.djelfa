<?php
session_start();
require './dbcon.php';
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
                        <h4>sections Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id_sections']))
                        {
                            $sections_id = mysqli_real_escape_string($con, $_GET['id_sections']);
                            $query = "SELECT * FROM sections WHERE id_sections='$sections_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $sections = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="sections_id" value="<?= $sections['id_sections']; ?>">

                                    <div class="mb-3">
                                        <label>sections Name</label>
                                        <input type="text" name="name" value="<?=$sections['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <input type="email" name="email" value="<?=$sections['Status'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>title</label>
                                        <input type="text" name="phone" value="<?=$sections['title'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>classroom_id</label>
                                        <input type="text" name="course" value="<?=$sections['classroom_id'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Grade_id</label>
                                        <input type="text" name="course" value="<?=$sections['Grade_id'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_sections" class="btn btn-primary">
                                            Update sections
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


