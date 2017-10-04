<?php
require 'connection.php';
$conn = Connect();
$result = mysqli_query($conn, "SELECT * FROM permanent_list WHERE approval!=1");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    header('Content-Type: application/json');
    echo json_encode($data);

$conn->close();
?>