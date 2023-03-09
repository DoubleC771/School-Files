<?php
include("db_connection.php");
	if(isset($_POST['submit'])) {
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$sql = "INSERT INTO loginTable (firstname, lastname, address, city) VALUES ('$firstname', '$lastname', '$address', '$city')";
		$result = mysqli_query($conn, $sql);

		if (mysqli_query($conn, $sql)) {
			echo "";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
		$servername = "localhost";
	}

	$select = "select * from logintable";
	$query = mysqli_query($conn, $select);
	if (isset($_GET['CustomerID'])) {
		$customerid = $_GET['CustomerID'];
		$delete = mysqli_query($conn, "DELETE FROM `logintable` WHERE `CustomerID`='$customerid'");

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
    <div class = "form-container" id = "table-container">
        
    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-check">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
</body>
</html> 