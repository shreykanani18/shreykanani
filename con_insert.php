<?php //SK
session_start();
extract($_REQUEST);
$uid = $_SESSION['uid'];
$con = mysqli_connect('localhost', 'root', '', 'notes');

$sql = "INSERT INTO notes (sno, uid, title, description) VALUES (NULL, '$uid','$title', '$description')";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
// die($sql);
if (!mysqli_errno($con)) {
    $_SESSION['msg'] = "Insert successful";
    header("Location: index1.php");
    die();
} else {
    $_SESSION['err'] = "There is some problem.";
    header("Location: index1.php");
    die();
}

