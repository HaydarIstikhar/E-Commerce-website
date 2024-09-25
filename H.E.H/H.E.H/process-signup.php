<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #0d5492;">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">H.E.H</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link"><i class="bi-house"></i> Home</a>
                <a href="product.php" class="nav-item nav-link"><i class="bi-search"></i> Product</a>
                <a href="cart.php" class="nav-item nav-link"><i class="bi-cart"></i> Cart</a>
              	<a href="contact.php" class="nav-item nav-link"><i class="bi-person-lines-fill"></i> Contact us</a>
            </div>
            <div class="navbar-nav ms-auto">              	
                <a href="login.php" class="nav-item nav-link"><i class="bi-person-circle"></i> Login</a>
              	
            </div>
        </div>
    </div>
</nav>
<div class="login-form">
  	<div class="p-5 my-5 bg-light rounded-3">
      <h1 class="text-center"><a href="signup.php">Return to registration page</a></h>

</div>
</footer>
<div class="fixed-bottom">
                <hr>
                <p class="text-center">A project by Ellard, Haris and Haydar</p>
</div>
</body>
</html>
<div class="login-form">
  	<div class="p-5 my-5 bg-light rounded-3">
<?php

if (empty($_POST["username"])){
    die("A username needs to be entered!"); }
if (empty($_POST["useremail"])){
    die("An email needs to be entered!"); }
if (!filter_var($_POST["useremail"], FILTER_VALIDATE_EMAIL)){
    die("A valid email needs to be entered");}
if (strlen($_POST["userpassword"])<5){
    die("A password with at least 5 characters needs to be entered!");}
if ($_POST["userpassword"] !== $_POST["userpassword2"]){
    die("Both passwords need to match!");}
$password_hash=password_hash($_POST["userpassword"], PASSWORD_DEFAULT);

$mysqli=require __DIR__ . "/config.php";
$sql = "INSERT INTO userlogin (username, useremail, password_hash)
        VALUES (?, ?, ?)";

mysqli_report(MYSQLI_REPORT_OFF);
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
$stmt->bind_param("sss",
                  $_POST["username"],
                  $_POST["useremail"],
                  $password_hash);
                  
    
if ($stmt->execute()) {
    header("Location: signup-success.php");
    exit;
} else {
    
    if ($mysqli->errno === 1062) {
        die("The email you have entered has already been taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

