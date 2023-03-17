<?php 
session_start();
if (isset($_SESSION["user_id"])) {
   include ("db_connection.php");
   $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
   $result = $conn->query($sql);
   $user = $result->fetch_assoc();
}
?>
<html>
    <body>
    <head>
	<title>PHP Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel = "stylesheet" href = "style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
    </head>
        <h1> Shopping Cart </h1>
        <?php 
            $query = "SELECT * FROM `bikeorder` ORDER by `OrderID` ASC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0 ) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div>
                            <form method = "post" action = "create.php?action=add&id<?php echo $row['OrderID']; ?>">
                                <img src = "<?php echo $row['Image']; ?>"/> 
                                <h2><?php echo $row['BikeName']; ?></h2>
                                <h2>$ <?php echo $row['Price']; ?></h2>
                                <input type = "text" name = "quantity" class = "form-control" value = "1" />
                                <input type = "submit" name = "add_to_cart" class = "btn btn-success" value = "Add to Cart" >
                            </form>
                        </div>
                    <?php
                }
            }
        ?>    
    </body>
</html>
