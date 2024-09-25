
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ecommerceweb</title>
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
    <form action="process-signup.php" method="post" novalidate>
        <div>
        <h2>Register</h2>
        <div class="col-md-4">
        <label for="username" class="form-label">Name</label>
        <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="col-md-4">
            <label for="useremail" class="form-label">Email</label>
            <input type="email" class="form-control" id="useremail" name="useremail">
        </div>
        <div class="col-md-4">
            <label for="userpassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="userpassword" name="userpassword">
        </div>
        <div class="col-md-4">
            <label for="userpassword2" class="form-label">Re-enter password</label>
            <input type="password" class="form-control" id="userpassword2" name="userpassword2">
        </div>
        <div class="col-md-4">
        <button type="submit" class="btn btn-primary btn-block form-label">Register</button>
    </form>
    <p><a href="login.php">Already logged in?</a></p>
</div>
</footer>
<div class="fixed-bottom">
                <hr>
                <p class="text-center">A project by Ellard, Haris and Haydar</p>

</body>
</html>