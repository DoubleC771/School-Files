<?php
include("db_connection.php");

$id = $_GET['updateid'];

session_start();
if (isset($_SESSION["user_id"])) {
   $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
   $result = $conn->query($sql);
   $user = $result->fetch_assoc();
}


if(isset($_POST['submit'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$city = $_POST['city'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];
		$sql = "UPDATE `logintable` SET `CustomerID`='$id',`firstname`='$firstname',`lastname`='$lastname',`address`='$address',`city`='$city',`username`='$username',`password`='$password',`usertype`='$usertype' WHERE `CustomerID` = '$id'";
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
	<title>PHP Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel = "stylesheet" href = "style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
	<form method="post" action="">
  <div class="row col-md-8 col-lg-4 border rounded mx-auto mt-5 p-4 shadow">
			
			<div class="h2">Update Profile</div>
			
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
			  <input name="firstname" type="text" class="form-control p-3" placeholder="First name" >
			</div>
			<div><small class="js-error js-error-firstname text-danger"></small></div>
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-square"></i></span>
			  <input name="lastname" type="text" class="form-control p-3" placeholder="Last name" >
			</div>
			<div><small class="js-error js-error-lastname text-danger"></small></div>
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-shop"></i></span>
			  <input name="address" type="text" class="form-control p-3" placeholder="Address" >
			</div>
			<div><small class="js-error js-error-gender text-danger"></small></div>
			
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></span>
			  <input name="city" type="text" class="form-control p-3" placeholder="City" >
			</div>
			<div><small class="js-error js-error-email text-danger"></small></div>
			
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1">@</span>
			  <input name="username" type="text" class="form-control p-3" placeholder="Username" >
			</div>
			<div><small class="js-error js-error-password text-danger"></small></div>
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
			  <input name="password" type="password" class="form-control p-3" placeholder="Password" >
			</div>
			<div class="progress mt-3 d-none">
			  <div class="progress-bar" role="progressbar" style="width: 50%;" >Working... 25%</div>
			</div>
      <div class="form-check">
      <?php if ($user['UserType'] == 1): ?>
  <input class="form-check-input" type="radio" name="usertype" id="flexRadioDefault1" value = "1">
  <label class="form-check-label" for="flexRadioDefault1">
    1 (Admin Access)
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="usertype" id="flexRadioDefault2" value = "0" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    0
  </label>
  <?php else: ?>
    <?php endif; ?>
</div>
<?php if ($user['UserType'] == 1): ?>
      <a href = 'display.php?' class='btn btn-success'> Back </a>	
    <?php else: ?>
    <?php endif; ?>
      <input type="submit" name="submit" value="Submit" class = "btn btn-primary">
		</div>

  <table>
    <thead>
  <tr>
		<td> 
      </div>		
		</td>
	</tr> 
  <thead>
  <table>
</form>
</body>
</html>