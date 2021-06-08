<?php
session_start();
require "includes/dbconnect.php";

$sql = "SELECT * FROM `tasks` ORDER BY `id` DESC";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {

    $tasks = "";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $id = $row['id'];
        $tasks .= "<tr>";
        $tasks .= "<td>" . $row['id']. "</td>";
        $tasks .= "<td>" . $row['due_date']. "</td>";
        $tasks .= "<td>" . $row['description']. "</td>";
        $tasks .= "<td>" . $row['assignedBy']. "</td>";
        $tasks .= "<td>" . $row['assignedTo']. "</td>";
        $tasks .= "<td>" . $row['status']. "</td>";
        $tasks .= "<td> <a class='btn btn-primary' id='edit' href='http://localhost/job-solutions/edit.php?id=$id'>Edit</a></td>";
        $tasks .= "<td> <a class='btn btn-danger delete-btn' data-id= '$id' id='delete' >Delete</a></td>";
        $tasks .= "</tr>";
    }
} else {
    $tasks = "<tr><td colspan='8'>No Record Found</td></tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <h2 class="text-dark">Task List</h2>
    <table class="table ">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Due Date</th>
        <th scope="col">Description</th>
        <th scope="col">assignedBy</th>
        <th scope="col">assignedTo</th>
        <th scope="col">status</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?= $tasks; ?>
    </tbody>
    </table>

    <script>
        $("tr").on("click", ".delete-btn", function () {
        if (confirm("Are you sure you want to delete this record?")) {
          let taskId = $(this).data("id");
          let dataObj = { sid: taskId };
          let myJSON = JSON.stringify(dataObj);
          let row = this;
          $.ajax({
            url: "http://localhost/job-solutions/api-delete.php",
            type: "POST",
            data: myJSON,
            success: function (data) {
              if (data.status == true) {
                $(row).closest("tr").fadeOut();
              }
            },
          });
        }
      });
    </script>
</body>
</html>