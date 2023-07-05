<?php
  include "./connection.php";

  session_start();
  if(!isset($_SESSION['user_id'])){
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
    <tr class="text-center">
      <th scope="col">Serial No</th>
      <th scope="col">Images</th>
      <th scope ="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
 
      $user_id = $_SESSION['user_id'];
      $sql = "SELECT * FROM `files`";
      $result = mysqli_query($conn, $sql);
      $rows = mysqli_num_rows($result);
      if($rows > 0){
          $user_id = null;
        for ($i=0; $i < $rows; $i++) { 
          $data = mysqli_fetch_assoc($result);
          $user_id++;
          echo "<tr class='text-center'><td>$user_id</td>".
          "<td> $data[path] </td>".
          "<td><a href ='./uploadedfile/" .$data["path"] . "' class='btn btn-outline-secondary text-white m-2 my-sm-0'> Open </a></td>
          </tr>";
        }
      }
      ?>
  </tbody>
</table>
  </div>
</body>

</html>