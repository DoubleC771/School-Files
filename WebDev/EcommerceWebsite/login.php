<?php 
$is_invalid = false;
include("db_connection.php");
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $sql = sprintf("SELECT * FROM logintable WHERE username = '%s'", 
      $conn -> real_escape_string($_POST['username']));

      $result = $conn->query($sql);

      $user = $result->fetch_assoc();

      if ($user) {
         if ($_POST['password'] === $user['password']) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["CustomerID"];
            header("location: index.php");
            exit;
      } 
   } 
   $is_invalid = true;
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
    <form method="POST">
    <div class = "form-container" id = "table-container">

    <?php 
         if ($is_invalid):
      ?>
      <em style = "color:red">Invalid Login</em>
      <?php endif; ?>

    <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username" name = "username" value = "<?= htmlspecialchars($_POST['username'] ?? "")?>">
    <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name = "password">
  </div>
  <div class="form-check">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div> 
</div>
</form>
</body>
</html>