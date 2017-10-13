<?php
  echo "Hello";
  require 'connection.php';
  session_start();
  $conn = Connect();
  if(isset($_POST('submit'))){
    $username = $_COOKIE['login'];
    $current = $_COOKIE['password'];
    $current_entered = md5($_POST['current_password']);
    if($current == $current_entered){
      if($_POST['new_password']==$_POST['reenter_password']){
        echo "Hello";
      }
      else{
        echo "else1";
        echo "<script type='text/javascript'>alert('new password and re entered passowords are not same'); window.location.href = 'settings.html';</script>";
      }
    }
    else{
      echo "else2";
      echo "<script type='text/javascript'>alert('Your entered current password is not same'); window.location.href = 'settings.html';</script>";
    }
  }
  else{
    echo "namaste";
  }

?>
