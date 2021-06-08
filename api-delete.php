<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
require "includes/dbconnect.php";

$data = json_decode(file_get_contents("php://input"), true);

$task_id = $data['sid'];

$sql = "DELETE FROM tasks WHERE `id`='{$task_id}'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Record Deleted Successfully', 'status' => true));
} else {
    echo json_encode(array('message' => 'Error Occured', 'status' => false));
    
}

?>
