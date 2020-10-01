<?php
    session_start();
    $sno=$_REQUEST['id'];
    $uid = $_SESSION['uid'];
    $con = mysqli_connect("localhost", "root", "", "notes");
    $sql= "DELETE FROM notes where sno='$sno'";
    $result = mysqli_query($con, $sql);
    if ($con) 
    {
        $_SESSION['insert_msg'] = "Delete successful";
    
        header("Location: index1.php");
    } 
    else 
    {
        $_SESSION['insert_msg'] = "There is some problem.";
        header("Location: index1.php");
    }
?>
