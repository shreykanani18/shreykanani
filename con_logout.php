<?php //SK
session_start();
    $_SESSION['login_msg']="Logout successful";
    setcookie('un');
    header("Location: index.php");
?>