<?php //SK
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to phpNotes</title>
</head>

<body>
    <?php
    if (isset($_SESSION['login_msg'])) {
        echo ("");
    ?>
        <div class="alert alert-danger" role="alert">
        <?php

        echo ($_SESSION['login_msg']);
        session_unset();
    }
    if (isset($_SESSION['msg'])) {
        echo ("");
        ?>
            <div class="alert alert-danger" role="alert">
            <?php

            echo ($_SESSION['msg']);
            unset($_SESSION['msg']);
        }
            ?>
            </div>
            <form action="con_Login.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1" style="margin: 10px;">Username
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" style="width: 300px;">
                    </label>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" style="margin: 10px;">Password
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" style="width: 300px;">
                    </label>
                </div>
                <button type="submit" class="btn btn-primary" style="margin: 10px;">Sign In</button>
            </form>
</body>

</html>