
<?php include '../components/head.php';
require '../dbcon.php';

?>

<body>
<?php include '../components/header.php';?>
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

<form method="post" action="code.php" >
    
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label >المرحلة الدراسية <span
        class="text-danger">*</span></label>
<select class="custom-select mr-sm-2" name="Grade_id">
    <option selected disabled>المراحل الدراسية</option>

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
</div>


<div class="col-md-4">
<div class="form-group">
<label >السنة الدراسية <span
        class="text-danger">*</span></label>
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
</div>



<div class="col-md-4">
<div class="form-group">
<label >الاستاذ<span
        class="text-danger">*</span></label>
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
</div>

        
    </div><br>
    <div class="row">

<div class="col-md-2">
    <div class="form-group">
        <label>رقم الاجتماع : <span class="text-danger">*</span></label>
        <input class="form-control" name="meeting_id" type="number">
    </div>
</div>


<div class="col-md-2">
    <div class="form-group">
        <label>عنوان الحصة : <span class="text-danger">*</span></label>
        <input class="form-control" name="topic" type="text">
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label>تاريخ ووقت الحصة : <span class="text-danger">*</span></label>
        <input class="form-control" type="datetime-local" name="start_time">
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
        <label>مدة الحصة بالدقائق : <span class="text-danger">*</span></label>
        <input class="form-control" name="duration" type="number">
    </div>
</div>

<div class="col-md-2">
    <div class="form-group">
        <label>كلمة المرور الاجتماع : <span class="text-danger">*</span></label>
        <input class="form-control" name="password" type="text">
    </div>
</div>


</div>

<div class="row">

<div class="col-md-4">
    <div class="form-group">
        <label>لينك البدء : <span class="text-danger">*</span></label>
        <input class="form-control" name="start_url" type="text">
    </div>
</div>

<div class="col-md-8">
    <div class="form-group">
        <label>لينك الدخول للطلاب : <span class="text-danger">*</span></label>
        <input class="form-control" name="join_url" type="text">
    </div>
</div>
</div>

                        

                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit" name="save_online_classe">بدأ الحصة</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
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

