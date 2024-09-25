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
<title>H.E.H</title>
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
                <a href="index.php" class="nav-item nav-link active"><i class="bi-house"></i> Home</a>
                <a href="product.php" class="nav-item nav-link"><i class="bi-search"></i> Product</a>
              	<a href="contact.php" class="nav-item nav-link"><i class="bi-person-lines-fill"></i> Contact us</a>
            </div>
            <div class="navbar-nav ms-auto"> 
            <?php if(isset($user)): ?>
                <a href="cart.php" class="nav-item nav-link"><i class="bi-cart"></i> Cart</a>
    <a href="confirmationlogin.php" class="nav-item nav-link"><i class="bi-person-circle"></i> <?= htmlspecialchars($user["username"]) ?></a>
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
  	<div class="p-5 my-4 bg-dark rounded-3" style="background-image: url('images/products.jpg')">
        <h1 class="text-white">Shop with us</h1>
        <p class="lead"><p class="text-white">Explore our amazing products and find the perfect one for you! </p>
        <p><a href="product.php"  class="btn btn-outline-primary"><b>View our products</b></a></p>
    </div>
    <div class="p-5 my-4 bg-dark rounded-3" style="background-image: url('images/cart.jpg')">
        <h1 class="text-white">Check your cart</h1>
        <p class="lead"><p class="text-white">Explore our amazing products and find the perfect one for you! </p>
        <p><a href="cart.php"  class="btn btn-outline-primary"><b>View our products</b></a></p>
    </div>
    <div class="p-5 my-4 bg-dark rounded-3" style="background-image: url('images/contact.png')">
        <h1 class="text-white">Contact us</h1>
        <p class="lead"><p class="text-white">Explore our amazing products and find the perfect one for you! </p>
        <p><a href="contact.php"  class="btn btn-outline-primary"><b>View our products</b></a></p>
    </div>
 </footer>
<div class="sticky-bottom">
                <hr>
                <p class="text-center">A project by Ellard, Haris and Haydar</p>
            </div>
        </div>
    </footer>
</div>
</body>
</html>