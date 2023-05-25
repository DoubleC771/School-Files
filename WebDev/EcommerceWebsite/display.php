<?php
include("db_connection.php");
	if(isset($_POST['submit'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "INSERT INTO loginTable (firstname, lastname, address, city, username, password) VALUES ('$firstname', '$lastname', '$address', '$city', '$username', '$password')";
		$result = mysqli_query($conn, $sql);
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
	if (isset($_GET['removeid'])) {
		$id = $_GET['removeid'];
	
		$sql = "DELETE FROM `bikeorder` where `OrderID`=$id";
		$result = mysqli_query($conn, $sql);
	
		if ($result) {
			header('location:display.php');
		} else {
			die (mysqli_error($conn));
		}
	}
	
	if (isset($_GET['delete_all'])) {
		$id = $_GET['delete_all'];
	
		$sql = "DELETE FROM `bikeorder`";
		$result = mysqli_query($conn, $sql);
	
		if ($result) {
			header('location:display.php');
		} else {
			die (mysqli_error($conn));
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- styleshits -->
	<title>Admin Panel</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="images/logo2.png">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700,800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
	<!-- user section -->
	<form method="post" action="">
	<div class =" d-flex align-items-end flex-row" id = "table-container" >
		<!-- directs admin to create.php where they will be able to add a user or an admin -->
		<div class = "p-2"><a href = 'create.php?' class='btn btn-success'> Add Users </a> </div>
		<!-- goes back to the landing page -->
		<div class="p-2"><a href = 'index.php?' class='btn btn-secondary'> Back </a></div>
	</div>
		<div id = "table-container" class = "d-flex justify-content-center">
        <table class = "table table-hover">
            <thead class = "thead-dark">
                <tr>
                    <th scope="col"> CustomerID </th>
                    <th scope="col"> First Name </th>
                    <th scope="col"> Last Name </th>
                    <th scope="col"> Address </th>
                    <th scope="col"> City </th>
					<th scope="col"> Username </th>
					<th scope="col"> Password </th>
					<th scope="col"> UserType </th>
					<th scope="col"> Action </th>
                </tr>
				<?php // if there is a user present in database then it would execute this 
				$num = mysqli_num_rows($query);
					if ($num>0) {
						while ($result = mysqli_fetch_assoc($query)) {
							echo "
						<tr>
							<td> ".$result['CustomerID']."</td>
							<td> ".$result['firstname']."</td>
							<td> ".$result['lastname']."</td>
							<td> ".$result['address']."</td>
							<td> ".$result['city']."</td>
							<td> ".$result['username']."</td>
							<td> ".$result['password']."</td>
							<td> ".$result['UserType']."</td>
							<td> 
								
								<a href = 'delete.php?deleteid=".$result['CustomerID']."' class = 'btn btn-danger' > Delete </a>

								<a href = 'update.php?updateid=".$result['CustomerID']."' class='btn btn-primary'> Update </a>
							</td>
						</tr>
							";
						}
					} else { //if not it would echo that there are no users in database
						echo "
					<tr>
						<td> No results. </td>
					</tr>";
					}
				?>
            </thead>
        </table>
		</div>
	</form>
	<br>
	<!-- section for items -->
	<div class =" d-flex align-items-end flex-row" id = "table-container" >
		<div class = "p-2"><a href = 'createitem.php?' class='btn btn-success'> Add Item </a> </div>
	</div>
	<div class =" d-flex align-items-end flex-row" id = "table-container" >
        <table class="table table-hover">
            <thead class="thead-dark">
				<th scope = "col"> OrderID </th>
                <th scope = "col"> Bike Name </th>
				<th scope = "col"> Image </th>
                <th scope = "col"> Price </th>
                <th scope = "col"> Description </th>
				<th scope = "col"> Stocks </th>
                <th scope = "col"> Action </th>
            </thead>
            <tbody>
                <?php // connects to the item database 
                $select_bike = mysqli_query($conn, "SELECT * FROM `bikeorder`");
                $total = 0;
                $subtotal = 0;
				// if there is an item in the database it would print it out
                if (mysqli_num_rows($select_bike) > 0) {
                    while ($result = mysqli_fetch_assoc($select_bike)) {
                ?>

                <tr>
                    <td> <?php echo $result['OrderID'];?> </td>
                    <td> <?php echo $result['BikeName']; ?> </td>
					<td> <img src = "ShoppingImages/<?php echo $result['Image']?>" class = "img-thumbnail img-fluid"> </td>
                    <td> $<?php echo $result['Price']; ?> </td>
					<td> <?php echo $result['Description']; ?> </td>
					<td> <?php echo $result['Stocks']; ?> </td>
					<!-- removeid=[$result[ID]] to get the id of the specified item to be deleted  -->
                    <td><a href = 'display.php?removeid=<?php echo $result['OrderID']; ?>' onclick ="return confirm('Remove item from cart?')" class = "btn btn-danger">Delete</a>
					<!-- same as remove but for updating  -->
					<a href = 'updateitem.php?updateid=<?php echo $result['OrderID']; ?>' onclick ="return confirm('Update item from cart?')" class = "btn btn-primary">Update</a>
					</td>
                </tr>

                <?php //errr ignore this
                    $total += (int)$subtotal;
                    };
                } else {
                    echo "
                    <tr>
						<td> No results. </td>
					</tr>";
                };
                ?>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<!-- remove everything from caaaaaaaaaart-->
                    <td> <a href = "display.php?delete_all" onclick ="return confirm('Remove all items from the cart?')" class = "btn btn-danger">Remove all</a></td>
                </tr>
            </tbody>
        </table>
</body>
</html>