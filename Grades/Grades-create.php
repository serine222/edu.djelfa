<?php
session_start();
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
                        <h4>Grade Add 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>اسم المستوى</label>
                                <input type="text" name="Grade_Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>الملاحظة</label>
                                <input type="text" name="Grade_Notes" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="save_Grade" class="btn btn-primary">حفظ</button>
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
