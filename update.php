<?php //SK
session_start();
extract($_REQUEST);
$con = mysqli_connect("localhost", "root", "", "notes");
$sql = "SELECT * FROM notes where sno=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>


<body>

    <form action="con_update.php" method="post">

        <input type="hidden" value="<?php echo ($row['sno']) ?>" name="sno" style="width: 300px;">

        <div class="form-group">
            <label for="exampleInputEmail1" style="margin: 10px;">Title
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" style="width: 300px;" value="<?php echo ($row['title']) ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" style="margin: 10px;">Description
                <input type="text" class="form-control" id="exampleInputPassword1" name="description" style="width: 300px;" value="<?php echo ($row['description']) ?>">
            </label>
        </div>

        <button type="submit" class="btn btn-danger" style="margin: 10px;">Update</button>

    </form>
</body>

</html>