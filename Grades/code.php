<?php
session_start();
require '../dbcon.php';

if(isset($_POST['delete_Grade']))
{
    $Grade_id = mysqli_real_escape_string($con, $_POST['delete_Grade']);

    $query = "DELETE FROM Grades WHERE Grade_id='$Grade_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Grade Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Grade Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_Grade']))
{
    $Grade_id = mysqli_real_escape_string($con, $_POST['Grade_id']);

    $Grade_Name = mysqli_real_escape_string($con, $_POST['Grade_Name']);
    $Grade_Notes = mysqli_real_escape_string($con, $_POST['Grade_Notes']);
    

    $query = "UPDATE Grades SET Grade_Notes=' $Grade_Name', Grade_Notes='$Grade_Notes' WHERE id='Grade_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Grade Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Grade Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_Grade']))
{
    $Grade_Name = mysqli_real_escape_string($con, $_POST['Grade_Name']);
    $Grade_Notes = mysqli_real_escape_string($con, $_POST['Grade_Notes']);
   

    $query = "INSERT INTO Grades (Grade_Name,Grade_Notes) VALUES (' $Grade_Name','$Grade_Notes')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Grade Created Successfully";
        header("Location: Grades-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Grade Not Created";
        header("Location: Grades-create.php");
        exit(0);
    }
}


?>

