<?php
include "./connection.php";

if (isset($_POST['signup-btn'])) {
  $user = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$user','$email', '$pass')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $success_msg = "signup successfull !!";
  } else {
    echo "details are incorrect !!";
  }
}

if (isset($_POST['login-btn'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];

  $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass';";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_num_rows($result);
  $user = mysqli_fetch_assoc($result);
 
  if ($rows > 0) {
    session_start();
    $_SESSION["user_id"] = $user['user_id'];
    header("Location: ./index.php");
    exit;
  } else {
    $error = "<p style='color:red;'> *Insert valid username or password !! </p>";
  }
}
