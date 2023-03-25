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

if(isset($_POST['update_online_classe']))
{
    $online_classe_id = mysqli_real_escape_string($con, $_POST['id']);

    $duration = mysqli_real_escape_string($con, $_POST['duration']);
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $meeting_id = mysqli_real_escape_string($con, $_POST['meeting_id']);
    $start_at = mysqli_real_escape_string($con, $_POST['start_at']);
    $topic = mysqli_real_escape_string($con, $_POST['topic']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $start_url = mysqli_real_escape_string($con, $_POST['start_url']);
    $join_url = mysqli_real_escape_string($con, $_POST['join_url']);
    $id_sections = mysqli_real_escape_string($con, $_POST['id_sections']);
    $classroom_id = mysqli_real_escape_string($con, $_POST['classroom_id']);
    $Grade_id = mysqli_real_escape_string($con, $_POST['Grade_id']);



    $query = "UPDATE online_classes SET duration='$duration', user_id='$user_id', meeting_id='$meeting_id', start_at='$start_at',topic='$topic',password='$password',start_url='$start_url',join_url='$join_url',id_sections='$id_sections',classroom_id='$classroom_id',Grade_id='$Grade_id' WHERE id='$online_classe_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "online_classe Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "online_classe Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_online_classe']))
{

    $response = ZoomApiHelper::createZoomMeeting($topic,$zoomUserId);  

    $duration = mysqli_real_escape_string($con, $_POST['duration']);
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $meeting_id = mysqli_real_escape_string($con, $_POST['meeting_id']);
    $start_at = mysqli_real_escape_string($con, $_POST['start_at']);
    $topic = mysqli_real_escape_string($con, $response->topic);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $start_url = mysqli_real_escape_string($con, $_POST['start_url']);
    $join_url = mysqli_real_escape_string($con, $response->join_url);
    $id_sections = mysqli_real_escape_string($con, $_POST['id_sections']);
    $classroom_id = mysqli_real_escape_string($con, $_POST['classroom_id']);
    $Grade_id = mysqli_real_escape_string($con, $_POST['Grade_id']);

    $query = "INSERT INTO online_classes (duration,user_id,meeting_id,start_at,topic,password,start_url,id_sections,classroom_id,Grade_id) VALUES ('$duration','$user_id','$meeting_id','$start_at','$topic','$password',''$start_url,'$join_url','$id_sections','$classroom_id','$Grade_id')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "online_classe Created Successfully";
        header("Location: online_classe-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "online_classe Not Created";
        header("Location: online_classe-create.php");
        exit(0);
    }
}


?>

