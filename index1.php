<?php

$con = mysqli_connect("localhost", "root", "", "notes");
if (!$con) {
    echo ("Sorry we failed to connect: ");
}
if (!isset($_COOKIE['un'])) {
?>
    <div class="alert alert-success" role="alert">
    <?php
    $_SESSION['msg'] = "Login First";
    header("Location: index.php");
    die();
}
if (isset($_SESSION['err'])) {
    ?>
        <label style="margin: 10px;"><?php echo ($_SESSION['err']) ?></label>
    <?php unset($_SESSION['err']);
} else if (isset($_SESSION['msg'])) { ?>
        <label style="margin: 10px;"><?php echo ($_SESSION['msg']) ?></label>
    <?php unset($_SESSION['msg']);
}

    ?>


    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <title>phpNotes - Notes taking made easy</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><img src="/crud/logo.svg" height="28px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="title">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="container my-4">
            <h2>Add a Note to phpNotes</h2>
            <form action="con_insert.php" method="POST">
                <div class="form-group">
                    <label for="title">Note Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <label for="desc">Note Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Note</button>
            </form>
        </div>

        <div class="container my-4">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    extract($_POST);
                    $uid = $_SESSION['uid'];
                    $_SESSION['uid'] = $uid;
                    $con = mysqli_connect("localhost", "root", "", "notes");

                    if (isset($_GET['title'])) {
                        $t = $_GET['title'];
                        $sql = "SELECT * FROM notes where title or description like '%$t%'";
                    } else {
                        $sql = "SELECT * FROM notes where uid=$uid";
                    }
                    
                   $result = mysqli_query($con, $sql);
                    
                    $num = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $num = $num + 1;
                    ?>
                        <tr>
                            <td><?php echo ($num) ?></td>
                            <td><?php echo ($row['title']) ?></td>
                            <td><?php echo ($row['description']) ?></td>
                            <td><a href="con_delete.php?id=<?php echo ($row['sno']) ?>"><input type="button" value="Delete" class="btn btn-danger"></a></td>
                            <td><a href="update.php?id=<?php echo ($row['sno']) ?>"><input type="button" value="Update" class="btn btn-primary"></a></td>
                        </tr>
                    <?php
                    } //sk
                    ?>
                </tbody>
            </table>
            <form action="con_logout.php">
                <input type="submit" value="Logout" class="btn btn-danger">
            </form>
        </div>
    </body>

    </html>