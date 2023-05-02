
<?php 
include '../components/head.php';
require '../dbcon.php';
?>

<body>
<?php include '../components/header.php';?>
 <!-- row -->
<div class="container bg-white col-xl-10 col-sm-12" >
    <div class="container">
        <div class="card no-border shadow m-4 ">
           <div class="card-header">
                <div class="justify-content-between d-flex p-2">
                   <h4 class="fw-bold">اضافة حصة جديدة</h4> 
                   <a href="index.php" class="btn btn-danger">رجوع  <i class="fa-solid fa-arrow-left"></i></a>
               </div>
           </div>
           <div class="card-body">
                <form class="form" method="post" action="code.php" >
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label >السنة الدراسية <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="classroom_id">
                                <option selected disabled> السنوات الدراسية </option>

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
                        <div class="form-group col-md-6">
                            <label >الاستاذ<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="id_teacher">
                                <option selected disabled> الاساتذة</option>

                                    <?php 
                                    $query = "SELECT * FROM teachers";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $teacher)
                                        {
                                            ?>
                               <option value='<?= $teacher['id_teacher']; ?>'><?= $teacher['Name']; ?> </option>

                                <?php      }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>عنوان الحصة : <span class="text-danger">*</span></label>
                            <input class="form-control" name="topic" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label>المادة: <span class="text-danger">*</span></label>
                            <input class="form-control" name="topic" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label>تاريخ ووقت الحصة : <span class="text-danger">*</span></label>
                            <input class="form-control" type="datetime-local" name="start_time">
                        </div>
                        <div class="form-group col-md-6">
                            <label>مدة الحصة بالدقائق : <span class="text-danger">*</span></label>
                            <input class="form-control" name="duration" type="number">
                        </div>
                        <div class="form-group col-md-6">
                                <label>رقم الاجتماع : <span class="text-danger">*</span></label>
                                <input class="form-control" name="meeting_id" type="number">
                        </div>
                        <div class="form-group col-md-6">
                                <label>كلمة المرور الاجتماع : <span class="text-danger">*</span></label>
                                <input class="form-control" name="password" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                           <label>لينك البدء : <span class="text-danger">*</span></label>
                           <input class="form-control" name="start_url" type="text">
                        </div>
                        <div class="form-group col-md-8">
                           <label>لينك الدخول للطلاب : <span class="text-danger">*</span></label>
                           <input class="form-control" name="join_url" type="text">
                        </div>        
                    </div><hr>
                    <div class="btnn">
                         <button type="submit" name="save_online_classe" class="btn">اضافة الحصة</button>
                         <a href="#" class="btn" id="cancel">الغاء</a>
                    </div>
                </form>
           </div>
        </div>            
    </div>
</div>

 <!-- Modal -->
   <!-- <div class="modal fade" id="m1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <br><br><br><br><br><br><br>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <img src="img/istockphoto-1164721866-612x612.jpg" alt="" style="width: 28%; margin-right: 200px; padding: 0;">
            <div class="modal-body text-center">
                <h5>خطا , يرجى التاكد من ملا جميع الخانات</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">موافق</button>
            </div>
            </div>
        </div>
   </div> -->

<?php include '../components/footer.php';?>

<!-- 
<script>
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id"]').empty();
                        $('select[name="Classroom_id"]').append('<option selected disabled >{{trans('Students_trans.Choose')}}...</option>');
                        $.each(data, function (key, value) {

                            $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script> -->






