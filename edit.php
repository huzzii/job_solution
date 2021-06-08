<?php
session_start();
require "includes/dbconnect.php";


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$id = $_GET['id'];
if (isset($_POST['submit'])){
  $description = test_input($_POST['description']);
  $ddate = test_input($_POST['ddate']);
  $status = test_input($_POST['status']);
  $assBy = test_input($_POST['assBy']);
  $assTo = test_input($_POST['assTo']);

  $sql = "UPDATE `tasks` SET `description` = '$description', `due_date` = '$ddate', `assignedBy` = '$assBy', `assignedTo` = '$assTo', `status` = '$status' WHERE `id` = '$id'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// print($sql);
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Record Updated Successfully')</script>";
    header("Location: dashboard.php");    
  } else {
    echo "<script>alert('Sorry There Was Some Error')</script>";
  }
}

$UserById = "SELECT * FROM `tasks` WHERE `id` = '$id'";
$fetchUserById = mysqli_query($conn, $UserById) or die(mysqli_error($conn));

if (mysqli_num_rows($fetchUserById) > 0) {
  $getUserById = mysqli_fetch_all($fetchUserById, MYSQLI_ASSOC);

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
  
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
  </head>
  <body>
    <!-- Login Form -->
    <form action="#" method="POST" id="login-form">
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" name="description" class="form-control" id="description" value="<?= $getUserById[0]['description']; ?>">
        </div>
        <div class="form-group">
          <label for="ddate">Due Date</label>
          <input type="date" name="ddate" class="form-control" id="ddate" value="<?= date('Y-m-d', strtotime($getUserById[0]['due_date'])); ?>">
        </div>
        <div class="form-group">
          <label for="status">status</label>
          <input type="text" name="status" class="form-control" id="status" value="<?= $getUserById[0]['status']; ?>">
        </div>
        <div class="form-group">
          <label for="assBy">Assigned By</label>
          <input type="text" name="assBy" class="form-control" id="assBy" value="<?= $getUserById[0]['assignedBy']; ?>">
        </div>
        <div class="form-group">
          <label for="assTo">Assigned To</label>
          <input type="text" name="assTo" class="form-control" id="assTo" value="<?= $getUserById[0]['assignedTo']; ?>">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Save" >
    </form>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
