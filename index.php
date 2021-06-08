<?php
require "includes/dbconnect.php";
session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['submit'])){
  
  $user = test_input($_POST['user']);
  $upass = test_input($_POST['upass']);

  $sql = "SELECT * FROM users WHERE `uname` = '$user' AND `password` = '$upass' ";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    if ($output[0]['role'] === '0') {
      $role = "Employee";
      $_SESSION['role'] = $role;
      $_SESSION['role-id'] = $output[0]['role'];
      $_SESSION['user-id'] = $output[0]['uname'];
      header("Location: dashboard.php");
    } else {
      $role = "Manager";
      $_SESSION['role'] = $role;
      $_SESSION['role-id'] = $output[0]['role'];
      $_SESSION['user-id'] = $output[0]['uname'];
      header("Location: dashboard.php");
    }
    
  } else {
    echo "<script>alert('No User Found')</script>";
  }
  
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
  
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <img src="main-logo.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="login-form">
          <input
            type="text"
            id="login"
            class="fadeIn second"
            name="user"
            placeholder="Enter Your User ID"
          />
          <input
            type="password"
            id="password"
            class="fadeIn third"
            name="upass"
            placeholder="Enter Your Password"
          />
          <input type="submit" name="submit" class="fadeIn fourth" value="Log In" />
        </form>

        
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
