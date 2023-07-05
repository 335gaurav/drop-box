<?php
  include "./connection.php";

  session_start();
  if(!isset($_SESSION['email'])){
    header("Location: ./new_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>details</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="../js/bootstrap.js"></script>
</head>

<body>
  <?php require "./navbar.php"; ?>
  <div class="container">
  <table class="table table-striped table-dark mt-5">
  <thead>
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "SELECT * FROM `users`";
      $result = mysqli_query($conn, $sql);
      $rows = mysqli_num_rows($result);
      if($rows > 0){
        $sr = null;
        for ($i=0; $i < $rows; $i++) { 
          $data = mysqli_fetch_assoc($result);
          $sr++;
          echo "<tr><td>$sr</td>";
          echo  "<td>$data[username]</td>";
          echo "<td>$data[email]</td>";
          echo "<td>$data[password]</td>
          </tr>";
        }
      }
      ?>
    
  </tbody>
</table>
  </div>
</body>

</html>