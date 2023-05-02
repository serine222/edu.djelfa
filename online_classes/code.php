<?php

session_start();
require '../dbcon.php';

if(isset($_POST['delete_online_classe']))
{
    $online_classe_id = mysqli_real_escape_string($con, $_POST['delete_online_classe']);

    $query = "DELETE FROM online_classes WHERE id='$online_classe_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "online_classe Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "online_classe Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

// if(isset($_POST['update_online_classe']))
// {
//     $online_classe_id = mysqli_real_escape_string($con, $_POST['id']);

//     $meeting_id = mysqli_real_escape_string($con, $_POST['meeting_id']);
//     $topic = mysqli_real_escape_string($con, $_POST['topic']);
//     $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
//     $duration = mysqli_real_escape_string($con, $_POST['duration']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);
//     $start_url = mysqli_real_escape_string($con, $_POST['start_url']);
//     $join_url = mysqli_real_escape_string($con, $_POST['join_url'] );
//     $classroom_id = mysqli_real_escape_string($con, $_POST['classroom_id']);

//     $id_teacher = mysqli_real_escape_string($con, $_POST['id_teacher']);



//     $query = "UPDATE online_classes SET duration='$duration', id_teacher='$id_teacher', meeting_id='$meeting_id', start_time='$start_time',topic='$topic',password='$password',start_url='$start_url',join_url='$join_url',classroom_id='$classroom_id'WHERE id='$online_classe_id' ";
//     $query_run = mysqli_query($con, $query);

//     if($query_run)
//     {
//         $_SESSION['message'] = "online_classe Updated Successfully";
//         header("Location: index.php");
//         exit(0);
//     }
//     else
//     {
//         $_SESSION['message'] = "online_classe Not Updated";
//         header("Location: index.php");
//         exit(0);
//     }

// }


if(isset($_POST['save_online_classe']))
{

    $meeting_id = mysqli_real_escape_string($con, $_POST['meeting_id']);
    $topic = mysqli_real_escape_string($con, $_POST['topic']);
    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
    $duration = mysqli_real_escape_string($con, $_POST['duration']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $start_url = mysqli_real_escape_string($con, $_POST['start_url']);
    $join_url = mysqli_real_escape_string($con, $_POST['join_url'] );
    $classroom_id = mysqli_real_escape_string($con, $_POST['classroom_id']);
   
    $id_teacher = mysqli_real_escape_string($con, $_POST['id_teacher']);

    $query = "INSERT INTO online_classes (meeting_id,topic,start_time,duration,password,start_url,join_url,classroom_id,id_teacher) VALUES 
    ('$meeting_id','$topic','$start_time','$duration','$password','$start_url','$join_url','$classroom_id','$id_teacher')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "online_classe Created Successfully";
        header("Location: add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "online_classe Not Created";
        header("Location: add.php");
        exit(0);
    }
}

?>

