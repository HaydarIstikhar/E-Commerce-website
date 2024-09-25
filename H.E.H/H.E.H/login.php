<?php
$is_invalid=false;
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $mysqli=require __DIR__ . "/config.php";
    $sql=sprintf("SELECT*FROM userlogin
            WHERE useremail ='%s'",
             $mysqli->real_escape_string($_POST["useremail"]));
             $result=$mysqli->query($sql);
             $user=$result->fetch_assoc();
             if ($user) {
                if (password_verify($_POST["userpassword"],$user["password_hash"])) {
                    session_start();
                    session_regenerate_id();
                    $_SESSION["user_id"]=$user["userid"];
                    header("Location: confirmationlogin.php");
                    exit;
                }

             }
    $is_invalid=true;
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
    <a href="cart.php" class="nav-item nav-link"><i class="bi-cart"></i> Cart</a>
<a href="login.php" class="nav-item nav-link"><i class="bi-person-circle"></i> Login</a>
<a href="signup.php" class="nav-item nav-link"><i class="bi-person-lines-fill"></i> Register</a>
      	
   </div>
        </div>
    </div>
</nav>


<div class="login-form">
  	<div class="p-5 my-5 bg-light rounded-3">



<h2 class="row g-3">Login</h2> 
<?php if ($is_invalid): ?>
    <em>Invalid login</em>

<?php endif; ?>

<form method="post">
  <div class="col-md-4">
    <label for="useremail" class="form-label">Email</label>
    <input type="useremail" class="form-control" name="useremail" id="useremail">
</div>
<div class="col-md-4">
    <label for="userpassword" class="form-label">Password</label>
    <input type="userpassword" class="form-control" name="userpassword" id="userpassword">
</div>
<div class="col-md-4">
<button type="submit" class="btn btn-primary btn-block form-label">Login</button>
<p class="row g-3 form-label"><a href="signup.php">Register an account</a></p>
</form>
</div>
</footer>
<div class="fixed-bottom">
                <hr>
                <p class="text-center">A project by Ellard, Haris and Haydar</p>
</div>
</body>
</html>

