<?php

session_start();
if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM userlogin
        WHERE userid = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

}


?>
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
<h1 class="text-center"><b>Welcome to our website!</b></h1>
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
              	<a href="contact.php" class="nav-item nav-link"><i class="bi-person-lines-fill"></i> Contact us</a>
            </div>
            <div class="navbar-nav ms-auto"> 
            <?php if(isset($user)): ?>
                <a href="cart.php" class="nav-item nav-link"><i class="bi-cart"></i> Cart</a>
    <a href="confirmationlogin.php" class="nav-item nav-link active"><i class="bi-person-circle"></i> <?= htmlspecialchars($user["username"]) ?></a>
<?php else: ?>
    <a href="cart.php" class="nav-item nav-link"><i class="bi-cart"></i> Cart</a>
<a href="login.php" class="nav-item nav-link"><i class="bi-person-circle"></i> Login</a>
<a href="signup.php" class="nav-item nav-link"><i class="bi-person-lines-fill"></i> Register</a>
<?php endif; ?>
      	
   </div>
        </div>
    </div>
</nav>
<div class="container">
<div class="text-center">
<div class="p-5 my-4 bg-light rounded-3">
<h1>Account</h1>
<?php if(isset($user)): ?>
    <p>Name: <?= htmlspecialchars($user["username"]) ?></p>
    <p>Email: <?= htmlspecialchars($user["useremail"]) ?></p>
    <p><a href="index.php" class=" btn btn-primary bi-house "> Return to Homepage</a></p>
    <p><a href="logout.php" class=" btn btn-danger">Log out</a></p>

<?php else: ?>
<p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
<?php endif; ?>
</div>
</div>
</footer>
<div class="fixed-bottom">
                <hr>
                <p class="text-center">A project by Ellard, Haris and Haydar</p>
            </div>
        </div>
    </footer>
</body>
</html>
