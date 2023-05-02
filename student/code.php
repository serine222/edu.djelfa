<?php
session_start();
require '../dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "تم حذف الطالب بنجاح !";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    


    $query = "UPDATE students SET name='$name', email='$email', phone='$phone' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "تم تعديل بيانات الطالب بنجاح !";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
  

    $class_id = mysqli_real_escape_string($con, $_POST['classroom_id']);



    $query = "INSERT INTO students (name,email,phone,classroom_id) VALUES ('$name','$email','$phone','$class_id')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "تم إنشاء الطالب بنجاح !";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}


?>

