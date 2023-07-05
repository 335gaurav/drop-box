<?php
  $server = "localhost";
  $user = "root";
  $pass = "";
  $db = "dropbox";

  $conn = mysqli_connect($server, $user, $pass, $db);
  if (!$conn) {
  echo "not connected !!";
  }
?>
