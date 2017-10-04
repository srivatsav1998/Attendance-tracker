<?php
require 'connection.php';
$conn = Connect();

if(!empty($_POST["username"])) {
  $result = mysqli_query($conn,"SELECT * FROM permanent_list WHERE user_name='" . $_POST["username"] . "'");

  $user_count = mysqli_num_rows($result);
  if($user_count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}
?>