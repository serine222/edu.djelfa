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
                        <h4>sections Details
                            <a href="sections-create.php" class="btn btn-primary float-end">Add sectionss</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>sections</th>

                                    <th>sections</th>
                                    <th>Status</th>
                                    <th>title</th>
                                    <th>classroom_id_sections</th>
                                    <th>Grade_id_sections</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM sectionss";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $sections)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $sections['id_sections_sections']; ?></td>
                                                <td><?= $sections['sections']; ?></td>
                                                <td><?= $sections['Status']; ?></td>
                                                <td><?= $sections['title']; ?></td>
                                                <td><?= $sections['classroom_id_sections']; ?></td>
                                                <td><?= $sections['Grade_id_sections']; ?></td>

                                                <td>
                                                    <a href="sections-view.php?id_sections=<?= $sections['id_sections']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="sections-edit.php?id_sections=<?= $sections['id_sections']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_sections" value="<?=$sections['id_sections'];?>" class="btn btn-danger btn-sm">Delete</button>
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