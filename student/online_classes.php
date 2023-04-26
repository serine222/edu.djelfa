
<?php 
include '../components/head.php';
require '../dbcon.php';
include '../components/header.php';
?>


  
    





<!--Zoom class schedule-->  
  <div class="container bg-white col-xl-10 col-sm-12">
    <div class="container">
      
      <h4 class="title text-center">حصص اونلاين الخاصة بهذا الطالب</h4>
       <div class="filter">

  <div class="t-table justify-content-between">
     <h6 class="title2">الحصص المبرمجة مع التفاصيل</h6> 
     
  </div>
  <table class="table table-hover shadow text-center">
      <thead>
      <tr class="df">
    

      <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM students WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                $classroom_id = $student['classroom_id'];
                                ?>

        
       
        <th scope="col">السنة</th>

        <th scope="col">المعلم</th>
        <th scope="col">عنوان الحصة</th>
        <th scope="col">تاريخ البداية</th>
        <th  scope="col">وقت الحصة</th>
        <th scope="col">رابط الحصة</th>
        <th scope="col">العمليات</th>
      </tr>
    </thead>
    <tbody>
      

         <?php 
                                   
                                    $query = "SELECT * FROM online_classes WHERE classroom_id='$classroom_id' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $online_classe)
                                        {
                                       
                                            ?>
                                            <tr>
                                           
                                            
                                       


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

                                      

<?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
      
    </tbody>
  </table>
</div>
</div>

<?php include '../components/footer.php';?>