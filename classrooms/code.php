<?php
session_start();
require '../dbcon.php';

if(isset($_POST['delete_class']))
{
    $classroom_id = mysqli_real_escape_string($con, $_POST['delete_class']);

    $query = "DELETE FROM classrooms WHERE classroom_id='$classroom_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "class Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "class Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_class']))
{
    $classroom_id = mysqli_real_escape_string($con, $_POST['classroom_id']);

    $Name_Class = mysqli_real_escape_string($con, $_POST['Name_Class']);
    $Grade_id = mysqli_real_escape_string($con, $_POST['Grade_id']);
   

    $query = "UPDATE classrooms SET Name_Class='$Name_Class', Grade_id='$Grade_id' WHERE classroom_id='$classroom_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "class Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "class Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_class']))
{
    $Name_Class = mysqli_real_escape_string($con, $_POST['Name_Class']);
    $Grade_id = mysqli_real_escape_string($con, $_POST['id-Grade']);
    

    $query = "INSERT INTO classrooms (Name_Class,Grade_id) VALUES ('$Name_Class','$Grade_id')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "class Created Successfully";
        header("Location: class-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "class Not Created";
        header("Location: class-create.php");
        exit(0);
    }
}


?>

