<?php
session_start();
require './dbcon.php';

if(isset($_POST['delete_sections']))
{
    $sections_id = mysqli_real_escape_string($con, $_POST['delete_sections']);

    $query = "DELETE FROM sectionss WHERE id='$sections_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "sections Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "sections Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_sections']))
{
    $sections_id = mysqli_real_escape_string($con, $_POST['sections_id']);

    $sections = mysqli_real_escape_string($con, $_POST['sections']);
    $Status = mysqli_real_escape_string($con, $_POST['Status']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $classroom_id = mysqli_real_escape_string($con, $_POST['classroom_id']);
    $classroom_id = mysqli_real_escape_string($con, $_POST['Grade_id']);

    


    $query = "UPDATE sectionss SET sections='$sections', Status='$Status', title='$title', classroom_id='$classroom_id',Grade_id='$Grade_id' WHERE id='$sections_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "sections Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "sections Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_sections']))
{
    $sections = mysqli_real_escape_string($con, $_POST['sections']);
    $Status = mysqli_real_escape_string($con, $_POST['Status']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $classroom_id = mysqli_real_escape_string($con, $_POST['classroom_id']);
    $classroom_id = mysqli_real_escape_string($con, $_POST['Grade_id']);


    $query = "INSERT INTO sectionss (sections,Status,title,classroom_id,Grade_id) VALUES ('$sections','$Status','$title','$classroom_id','$Grade_id')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "sections Created Successfully";
        header("Location: sections-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "sections Not Created";
        header("Location: sections-create.php");
        exit(0);
    }
}


?>

