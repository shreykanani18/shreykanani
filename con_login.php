<?php //SK
session_start();
// $u = $_REQUEST['username'];
// $p = $_REQUEST['password'];
extract($_POST);
$con = mysqli_connect('localhost', 'root', '', 'notes');

$sql = "SELECT * from users WHERE username='$username' and password='$password'";

$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);
$_SESSION['uid']=$row['uid'];
if ($row) {
    setcookie("un", $_POST['username']);
    $_SESSION['login_msg'] = $_REQUEST['username'];
    
    header("Location: index1.php");
} else {
    $_SESSION['login_msg'] = "Username/Password does not match.";
    header("Location: index.php");
}
?>