<?php //SK
session_start();
$uid = $_SESSION['uid'];
extract($_POST);
$con = mysqli_connect('localhost', 'root', '', 'notes');

$sql = "UPDATE `notes` SET uid=$uid,`title` = '$title' , `description` = '$description' WHERE `notes`.`sno` = $sno";

$result = mysqli_query($con, $sql);
// die($sql);
if (!mysqli_errno($con)) {
    $_SESSION['msg'] = "Update successful";
    header("Location: index1.php");
    die();
} else {
    $_SESSION['err'] = "There is some problem.";
    header("Location: index1.php");
    die();
}
