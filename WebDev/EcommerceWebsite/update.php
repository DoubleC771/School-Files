<?php								//update a user's profile
include("db_connection.php");

$id = $_GET['updateid']; 			//get a user's id from display.php

session_start();
if (isset($_SESSION["user_id"])) {
   $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
   $result = $conn->query($sql);
   $user = $result->fetch_assoc();
}


if(isset($_POST['submit'])) {				// if submit button is pressed then
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$city = $_POST['city'];
    	$username = $_POST['username'];
    	$usertype = $_POST['usertype'];
		$image = $_POST['Image'];
		$sql = "UPDATE `logintable` SET `CustomerID`='$id',`firstname`='$firstname',`lastname`='$lastname',`address`='$address',`city`='$city',`username`='$username',`usertype`='$usertype' ,`Image`='$image' WHERE `CustomerID` = '$id'";
		if (mysqli_query($conn, $sql)) {
			header('location: myaccount.php');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
		$servername = "localhost";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel = "stylesheet" href = "style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>
<body>
	
	<form method="post" action="">
	<div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
			<div class="col-md-4 text-center">
				<img src="<?=get_image($row['image'])?>" class="js-image img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
				<div>
					<div class="mb-3">
					  <label for="formFile" class="form-label">Click below to select an image</label>
					  <!-- does not work yet -->
					  <input name = "Image" onchange="display_image(this.files[0])" class="js-image-input form-control" type="file" id="formFile">
					</div>
					<div><small class="js-error js-error-image text-danger"></small></div>
				</div>
			</div>
			<div class="col-md-8">
				
				<div class="h2">Edit Profile</div>

				<form method="post">
					<table class="table table-striped">
						<tr><th colspan="2">User Details:</th></tr>
						<tr><th><i class="bi bi-person-circle"></i> First Name</th>
							<td>
								<!-- value is present here to display the past version of the user's info such as his/her firstname and the such so dat it would be easier to update -->
								<input value="<?=$user['firstname']?>" type="text" class="form-control" name="firstname" placeholder="First Name">
								<div><small class="js-error js-error-email text-danger"></small></div>
							</td>
						</tr>
						<tr><th><i class="bi bi-person-square"></i> Last Name </th>
							<td>
								<input value="<?=$user['lastname']?>" type="text" class="form-control" name="lastname" placeholder="First name">
								<div><small class="js-error js-error-firstname text-danger"></small></div>
							</td>
						</tr>
						<tr><th><i class="bi bi-shop"></i> Address </th>
							<td>
								<input value="<?=$user['address']?>" type="text" class="form-control" name="address" placeholder="address">
								<div><small class="js-error js-error-lastname text-danger"></small></div>
							</td>
						</tr>
						<tr><th><i class="bi bi-geo-alt-fill"></i> City </th>
							<td>
								<input type="text" class="form-control" name="city" placeholder="" value = "<?=$user['city']?>">
								<div><small class="js-error js-error-password text-danger"></small></div>
							</td>
						</tr>
						<tr><th><i class="person-fill"></i> Username</th>
							<td>
								<input type="text" class="form-control" name="username" placeholder="Username"value = "<?=$user['username']?>">
							</td>
						</tr>
					</table>
					<div class="form-check">
      <?php if ($user['UserType'] == 1): ?> <!-- displays the following html elements if the user is an admin. If not, it would not display dis shet-->
		<select name="usertype" class="form-select form-select mb-3" aria-label=".form-select-lg example">
								  <option value="">--Select Usertype--</option>	
								  <option value="1">Admin</option>
								  <option value="0">User</option>
								</select>
								<div><small class="js-error js-error-gender text-danger"></small></div>
  	<?php else: ?>
    <?php endif; ?>

					<div class="progress my-3 d-none">
					  <div class="progress-bar" role="progressbar" style="width: 50%;" >Working... 25%</div>
					</div>

					<div class="p-2">
						<!-- submit button ere -->
						<button class="btn btn-primary float-end" name = "submit" value = "submit" type = "submit">Save</button>
						
						<a href="index.php">
							<label class="btn btn-secondary">Back</label>
						</a>

					</div>
	</form>
</body>
</html>