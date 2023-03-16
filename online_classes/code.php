<?php
session_start();
require './dbcon.php';

if(isset($_POST['delete_online_classes']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_online_classes']);

    $query = "DELETE FROM students WHERE id='$online_classes_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "online classes Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "online classes Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_online_classes']))
{
    $online_classe_id = mysqli_real_escape_string($con, $_POST['online_classe_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $Grade_id = mysqli_real_escape_string($con, $_POST['Grade_id']);
    $duration = mysqli_real_escape_string($con, $_POST['duration']);
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $meeting_id = mysqli_real_escape_string($con, $_POST['meeting_id']);
    $Classroom_id = mysqli_real_escape_string($con, $_POST['Classroom_id']);
    $section_id = mysqli_real_escape_string($con, $_POST['section_id']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $start_url = mysqli_real_escape_string($con, $_POST['start_url']);
    $join_url = mysqli_real_escape_string($con, $_POST['join_url']);

    $query = "UPDATE online_classes SET name='$name', Grade_id='$Grade_id', duration='$duration', user_id='$user_id', meeting_id='$meeting_id', Classroom_id='$Classroom_id', course='$course',join_url='$join_url',start_url='$start_url,password='$password',section_id='$section_id'' WHERE id=' $online_classe_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "online classes Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "online classes Not Updated";
        header("Location: index.php");
        exit(0);
    }

}

  


if(isset($_POST['save_online_classes']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $Grade_id = mysqli_real_escape_string($con, $_POST['Grade_id']);
    $duration = mysqli_real_escape_string($con, $_POST['duration']);
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $meeting_id = mysqli_real_escape_string($con, $_POST['meeting_id']);
    $Classroom_id = mysqli_real_escape_string($con, $_POST['Classroom_id']);
    $section_id = mysqli_real_escape_string($con, $_POST['section_id']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $start_url = mysqli_real_escape_string($con, $_POST['start_url']);
    $join_url = mysqli_real_escape_string($con, $_POST['join_url']);



    $query = "INSERT INTO online_classes (name,Grade_id,duration,user_id,meeting_id,Classroom_id,section_id,password,start_url,join_url) VALUES ('$name','$Grade_id','$duration','$user_id','$meeting_id','$Classroom_id','$section_id','$password','$start_url','$join_url')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
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