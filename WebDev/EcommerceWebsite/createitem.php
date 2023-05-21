<?php
include("db_connection.php");             // similar to create.php but this page is for items (in our case, it was used for bicycles)
if(isset($_POST['submit'])) {             // if user (or admin in this case) presses the 'submit' button, it would push these values into the database
		$bikename = $_POST['bikename'];
		$image = $_POST['Image'];
    $price = $_POST['Price'];
    $description = $_POST['Description'];
    $stocks = $_POST['Stocks'];
		$sql = "INSERT INTO bikeorder (bikename, Image, Price, Description, Stocks) VALUES ('$bikename', '$image', '$price', '$description', '$stocks')";
		if (mysqli_query($conn, $sql)) {
			header('location: display.php');
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
	<title> Item Form </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel = "stylesheet" href = "style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
	<form method="post" action="">
    <div class = "form-container" id = "table-container">
      <label for="ProductName" class="form-label">Product Name</label>
      <input type="text" class="form-control" id="ProductName" placeholder="XMX 2000" name = "bikename">
    <div class="mb-3">
      <label for="formFile" class="form-label">Product Image</label>
      <input class="form-control" type="file" id="formFile" name = "Image">
    </div>
      <label for="ProductName" class="form-label">Price</label>
      <input type="text" class="form-control" id="ProductName" placeholder="200" name = "Price">
      <div class="mb-3">
        <label for="Description" class="form-label">Product Description</label>
        <textarea class="form-control" id="Description" rows="3" name = "Description"></textarea>
      </div>
      <label for="Stocks" class="form-label">Stocks Available</label>
      <input type="text" class="form-control" id="Stocks" placeholder="500" name = "Stocks">
      <table>
    <thead>
  <tr>
		<td> 
      <a href = 'display.php?' class='btn btn-success'> Back </a>	
      <input type="submit" name="submit" value="Submit" class = "btn btn-primary">
      </div>		
		</td>
	</tr> 
  <thead>
  <table>
    </div>
  </form>
</body>
</html>