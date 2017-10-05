<?php
require 'connection.php';
session_start();
$conn = Connect();
$username = $_COOKIE['login'];
$result = mysqli_query($conn, "SELECT * FROM permanent_list WHERE user_name = '$username'");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    header('Content-Type: application/json');
    echo json_encode($data);

$conn->close();
?>
