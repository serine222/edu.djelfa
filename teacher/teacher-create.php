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
                        <h4>اضافة استاذ
                            <a href="index.php" class="btn btn-danger float-end">خلف</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>اسم الاستاذ</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>بريد الالكتروني</label>
                                <input type="email" name="Email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>تاريخ انضمام المعلم</label>
                                <input type="text" name="Joining_Date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>عنوان المعلم</label>
                                <input type="text" name="Address" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>كلمة السر</label>
                                <input type="Password" name="Password" class="form-control">
                            </div>
                          

                            <div class="mb-3">
                                <label for="Name_en"
                                class="mr-sm-2">المواد 
                                :</label>

                            <div class="mb-3">
                                <select class="fancyselect" name="id_specialization">
                                    
                                <?php 
                                    $query = "SELECT * FROM specializations";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $specialization)
                                        {
                                            ?>
                                <option value='<?= $specialization['id_specialization']; ?>'><?= $specialization['Name_specialization']; ?> </option>

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
                                <label for="Name_en"
                                class="mr-sm-2">اسم المستوى
                                :</label>

                            <div class="mb-3">
                                <select class="fancyselect" name="classroom_id">
                                    
                                <?php 
                                    $query = "SELECT * FROM classrooms";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $class)
                                        {
                                            ?>
                                <option value='<?= $class['classroom_id']; ?>'><?= $class['Name_Class']; ?> </option>

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
                                <button type="submit" name="save_teacher" class="btn btn-primary">حفظ</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
    <?php include '../components/footer.php';?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

