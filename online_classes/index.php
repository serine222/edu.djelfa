
<?php 
include '../components/head.php';
require '../dbcon.php';
include '../components/header.php';
?>


  
    





<!--Zoom class schedule-->  
  <div class="container bg-white col-xl-10 col-sm-12">
    <div class="container">
      
      <h4 class="title text-center">حصص اونلاين</h4>
       <div class="filter">
      
  <!-- <div class="card card-no-hover text-center no-shadow border-green">
    <div class="card-body shadow">
        <label class="bold" for="type">المرحلة :</label>
        <select class="dropdown bootstrap-select  p-1" style="width: 10%;">
        <div class="card-body shadow">
        <label class="bold" for="type">المرحلة :</label><
        <select class="dropdown bootstrap-select  p-1" style="width: 10%;">
          <option value="all" selected>الكل</option>
          <option value="1">ابتدائي</option>
          <option value="2">متوسط</option>
          <option value="3">ثانوي</option>
        </select>
        <label class="bold" for="type">السنة :</label>
        <select class="dropdown bootstrap-select dropup p-1" style="width: 10%;">
        <option value="all" selected>الكل</option>
        <option value="1">اولى</option>
        <option value="2">ثانية</option>
        <option value="3">ثالثة</option>
        <option value="4">رابعة</option>
        <option value="5">خامسة</option>
      </select>
      <label class="bold" for="type">المرحلة :</label>
      <select class="dropdown bootstrap-select dropup p-1" style="width: 10%;">
        <option value="all" selected>الكل</option>
        <option value="1">لغة عربية</option>
        <option value="2">رياضيات</option>
        <option value="3">علوم طبيعية</option>
        <option value="">علوم فيزيائية</option>
        <option value="">لغة فرنسية</option>
        <option value="">لغة انجليزية</option>
        <option value="">اجتماعيات</option>
        <option value="">علوم اسلامية</option>
        <option value="">تربية مدنية</option>
        <option value="">اعلام الي</option>  
        <option value="">موسيقى</option>
        <option value="">رسم</option>
      </select>
      <label class="name" for="type">الاستاذ :</label>
      <input type="text" name="name" id="" placeholder="اسم الاستاذ" style="height: 40px;";>
      </div>
  </div> -->
  <div class="t-table justify-content-between">
     <h6 class="title2">الحصص المبرمجة مع التفاصيل</h6> 
     <a href="add.php"> <button class="btn" id="#btn"><i class="fa-solid fa-plus"></i>اضافة حصة جديدة</button></a>
  </div>
  <table class="table table-hover shadow text-center">
      <thead>
      <tr class="df">
    

        <th scope="col">#</th>
        <th  scope="col">المرحلة</th>
        <th scope="col">الصف</th>

        <th scope="col">المعلم</th>
        <th scope="col">عنوان الحصة</th>
        <th scope="col">تاريخ البداية</th>
        <th  scope="col">وقت الحصة</th>
        <th scope="col">رابط الحصة</th>
        <th scope="col">العمليات</th>
      </tr>
    </thead>
    <tbody>
      
      <!-- <tr>
          <td>ابتدائي</td>
          <td>خامسة</td>
          <td>رياضيات</td>
          <td>محمدي اسامة</td>
          <td>القسمة الاقليدية</td>
          <td>2023/03/14</td>
          <td>17:30</td>
          <td><button class="btn">انظم الان</button></td>
      </tr> -->

         <!-- @foreach($online_classes as $online_classe) -->

         <?php 
                                    $query = "SELECT * FROM online_classes";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $online_classe)
                                        {
                                            ?>
                                            <tr>
                                           
                                            <td><?=$online_classe['id']; ?></td>
                                            <?php
                                                $Grade_id = $online_classe['Grade_id'];
                                                $query = "SELECT * FROM Grades WHERE Grade_id='$Grade_id' ";
                                               $query_run = mysqli_query($con, $query);
                                               if(mysqli_num_rows($query_run) > 0)
                                                    {
                                                        $Grade = mysqli_fetch_array($query_run);
                                                        ?>




                                                <td><?=$Grade['Grade_Name']; ?></td>

                                                <?php
                                                    }
                                                    else
                                                    {
                                                        echo "<h4>No Such Id Found</h4>";
                                                    }
                                                
                                                ?>


                                                <?php
                                                $classroom_id = $online_classe['classroom_id'];
                                                $query = "SELECT * FROM classrooms WHERE classroom_id='$classroom_id' ";
                                               $query_run = mysqli_query($con, $query);
                                               if(mysqli_num_rows($query_run) > 0)
                                                    {
                                                        $classroom = mysqli_fetch_array($query_run);
                                                        ?>
                                                <td><?=$classroom['Name_Class']; ?></td>
                                                <?php
                                                    }
                                                    else
                                                    {
                                                        echo "<h4>No Such Id Found</h4>";
                                                    }
                                                
                                                ?>



                                                <?php
                                                $id_teacher = $online_classe['id_teacher'];
                                                $query = "SELECT * FROM teachers WHERE id_teacher='$id_teacher' ";
                                               $query_run = mysqli_query($con, $query);
                                               if(mysqli_num_rows($query_run) > 0)
                                                    {
                                                        $teacher = mysqli_fetch_array($query_run);
                                                        ?>
                                                                        
                                                                        <td><?=$teacher['Name']; ?></td>

                                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        echo "<h4>No Such Id Found</h4>";
                                                    }
                                                
                                                ?>
                                                                      
                                                <td><?=$online_classe['topic']; ?></td>
                                                <td><?=$online_classe['start_time']; ?></td>
                                                <td><?=$online_classe['duration']; ?></td>
                                               
                                               

                                              
                                                <td class="text-danger"><a href="{<?=$online_classe['join_url']; ?>}" target="_blank">انضم الان</a></td>

                                                <td>
                                                
                                                  
                                                
                                                    
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_online_classe" value="<?= $online_classe['id']; ?>" class="btn btn-danger btn-sm">حذف</button>
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

<?php include '../components/footer.php';?>