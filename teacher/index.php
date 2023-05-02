<?php
    session_start();
require '../dbcon.php';
?>
<?php include '../components/head.php';?>

<body>
  <?php include '../components/header.php';?>
    <!--teacher-list-->
    <div class="container bg-white col-xl-10 col-sm-12">
        <div class="student-list">
            <h3 class="text-center fw-bold mt-5 mb-5">قائمة  الاساتذة</h3>
            <?php include('message.php'); ?>
            <div class="t-table justify-content-between">
                <h5 class="fw-bold"> قائمة الاساتذة</h5> 
                <a href="teacher-create.php"> <button class="btn" id="#btn"><i class="fa-solid fa-plus"></i> اضافة استاذ جديد </button></a>

            </div>
            <table class="table table-hover shadow text-center">
                <thead>
                   <tr class="df"> 
                        <th scope="col">اسم الاستاذ</th>
                        <th scope="col">البريد الالكتروني</th>
                        <th scope="col">العنوان</th>
                        <th scope="col">تاريخ بدا العمل</th>
                        <th scope="col">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM teachers";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $teacher)
                            {
                                ?>
                                <tr>
                                    <!-- <td><?= $teacher['id_teacher']; ?></td> -->
                                    <td><?= $teacher['Name']; ?></td>
                                    <td><?= $teacher['Email']; ?></td>
                                    <td><?= $teacher['Address']; ?></td>
                                    <td><?= $teacher['Joining_Date']; ?></td>
                                    <td>
                                        <div class=" dropdown show">
                                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >عرض</a>
                                            <div class="form dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="teacher-view.php?id=<?= $teacher['id_teacher']; ?>"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات الاستاذ</a>
                                                <a class="dropdown-item" href="teacher-edit.php?id=<?= $teacher['id_teacher']; ?>"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات الاستاذ</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                   <button type="submit" name="delete_teacher" value="<?= $teacher['id_teacher']; ?>" class="dropdown-item"><i style="color: red" class="fa fa-trash"></i>&nbsp; حذف بيانات الاستاذ</button>
                                                </form>
                                        </div>        
                                    </td>
                                   

                   
                                </tr>
                                <?php
                            }
                        } else {
                            echo "  <tr> <td><h5> لاتوجد سجلات </h5>  <td> </tr>";
                        }
                    ?>   
                          
                </tbody>
            </table>
        </div>
   </div>

        
    <?php include '../components/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

