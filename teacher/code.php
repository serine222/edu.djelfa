<?php
session_start();
require '../dbcon.php';

if(isset($_POST['delete_teacher']))
{
    $teacher_id = mysqli_real_escape_string($con, $_POST['delete_teacher']);

    $query = "DELETE FROM teachers WHERE id_teacher='$teacher_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "teacher Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "teacher Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_teacher']))
{
    $teacher_id = mysqli_real_escape_string($con, $_POST['id_teacher']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $Joining_Date = mysqli_real_escape_string($con, $_POST['Joining_Date']);
    $Address = mysqli_real_escape_string($con, $_POST['Address']);
    $Password = mysqli_real_escape_string($con, $_POST['Password']);
    // $id_specialization = mysqli_real_escape_string($con, $_POST['id_specialization']);
    // $Grade_id = mysqli_real_escape_string($con, $_POST['Grade_id']);
    // $classroom_id = mysqli_real_escape_string($con, $_POST['classroom_id']);

    $query = "UPDATE teachers SET name='$name', Email='$email', Joining_Date='$Joining_Date', Address='$Address', Password='$Password' WHERE id_teacher='$teacher_id' ";
    // , id_specialization='$id_specialization', Grade_id='$Grade_id', classroom_id='$classroom_id'
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "teacher Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "teacher Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_teacher']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $Joining_Date = mysqli_real_escape_string($con, $_POST['Joining_Date']);
    $Address = mysqli_real_escape_string($con, $_POST['Address']);
    $Password = mysqli_real_escape_string($con, $_POST['Password']);
    $id_specialization = mysqli_real_escape_string($con, $_POST['id_specialization']);
   
    $classroom_id = mysqli_real_escape_string($con, $_POST['classroom_id']);




    $query = "INSERT INTO teachers (name,Email,Joining_Date,Address,Password,id_specialization,classroom_id) VALUES ('$name','$email','$Joining_Date','$Address','$Password',' $id_specialization','$classroom_id')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "teacher Created Successfully";
        header("Location: teacher-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "teacher Not Created";
        header("Location: teacher-create.php");
        exit(0);
    }
}


?>

