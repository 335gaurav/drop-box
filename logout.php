<?php
  session_start();
  session_destroy();
  session_unset();
  header("Location: ./new_login.php");
?>