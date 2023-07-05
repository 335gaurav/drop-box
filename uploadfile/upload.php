<?php
  include "../connection.php";
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("Location: ./new_login.php");
    exit;
	}

	if(isset($_POST['upload-btn'])){
		$user_id = $_SESSION['user_id'];
		
		$file = $_FILES['filepath']['name'];
		$fileext = explode('.',$file);
    $filecheck= strtolower(end($fileext));
    $filestored = array('pdf','zip','txt','jpeg', 'jpg', 'png');

    if(in_array($filecheck, $filestored)){
			$sql = "INSERT INTO `files` (`path`,`user_id`) VALUES ('$file','$user_id')";
			$result = mysqli_query($conn, $sql);
			if($result){
				echo "data inserted successfully !!";
				move_uploaded_file($_FILES['filepath']['tmp_name'], "../uploadedfile/$file");
				header("Location: ../index.php");
			}
			} else {
				$error = '*only "pdf, zip, txt, jpeg, jpg, png" formats are exists !!';
			}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/bootstrap.css">
  <title>upload file</title>
	<style>
		.container{
			/* max-width: 1140px; */
			/* margin: 0 auto; */
			background-color: lavender;
			display: flex;
			/* align-items: center; */
			justify-content: center;
			/* gap: 20px; */
		}
		.file-wrap{
			padding-top: 150px;
			height: 400px;
			/* width: 100%; */
			/* display: flex; */
			/* flex-direction: column; */
			/* gap:20px; */
			/* justify-content:center; */
			/* align-items: center; */
			/* flex-wrap:wrap ; */
			/* padding-top: 200px;  */
		}
	</style>
</head>
<body>
	<form action="./upload.php" method="post" enctype="multipart/form-data">
		<div class="container">
			<div class="file-wrap">
		<input type="file" name="filepath" class="form-control form-control-lg" id="file">
		<p class ="text-danger" ><?php echo isset($error) ? $error : null ;?></p>
		<input type="submit" value="submit file" name = "upload-btn" class=" btn btn-dark text-white mt-3">
		</div>
		</div>
	</form>
</body>
</html>