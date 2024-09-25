<?php
$conn = mysqli_connect('localhost','root','','21140296_22226101_22166523') or die('connection failed');
session_start();
if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM userlogin
        WHERE userid = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $user_id = $_SESSION['user_id'];
    if(isset($_POST['addcart'])){

        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_image = $_POST['item_image'];
        $item_quantity = $_POST['item_quantity'];
     
        $select_cart = mysqli_query($conn, "SELECT * FROM `orderid` WHERE productname = '$item_name' AND userid = '$user_id'") or die('query failed');
     
        if(mysqli_num_rows($select_cart) > 0){
           $popup[] = 'This product has already added to the cart!';
        }else{
           mysqli_query($conn, "INSERT INTO `orderid`(userid, productname, productprice, image, productquantity) VALUES('$user_id', '$item_name', '$item_price', '$item_image', '$item_quantity')") or die('query failed');
           $popup[] = 'The product has been added to cart!';
        }
    }
     
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
<link rel="stylesheet" href="style/style.css">
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
                <a href="product.php" class="nav-item nav-link active"><i class="bi-search"></i> Product</a>
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
<div>   	
   </div>
        </div>
    </div>
</nav>



<div class="container">
<div class="p-5 my-4 bg-dark rounded-3" style="background-image: url('images/products.jpg')">
        <h1 class="text-center text-white">Shop with us</h1>
        <p class="text-white text-center">Explore our amazing products and find the perfect product for you! </p>
    </div>
    <?php
if(isset($popup)){
   foreach($popup as $popup){
      echo '<h4 class="text-center" >'.$popup.'</h4>';
   }
}
?>




<h1 class="text-center"><b>Products</b></h1>
<div class="items">

   <div class="items-container">

   <?php
      $select_item = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
      if(mysqli_num_rows($select_item) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_item)){
   ?> 

    <form method="post" class="items" action="">
      <h5 class="text-center"><?php echo $fetch_product['productname']; ?></h5>
         <img src="images/<?php echo $fetch_product['image']; ?>"  alt="">
         <h6 class="text-center">£<?php echo $fetch_product['productprice']; ?></h6>
         <input type="number" min="1" name="item_quantity" value="1">
         <input type="hidden" name="item_name" value="<?php echo $fetch_product['productname']; ?>">
         <input type="hidden" name="item_price" value="<?php echo $fetch_product['productprice']; ?>">
         <input type="hidden" name="item_image" value="<?php echo $fetch_product['image']; ?>">
         
         <input type="submit" value="Add to cart" name="addcart" class="btn btn-primary">
         </form>
<?php
      };
   };
   ?>
</div>

</div>


</footer>
    <div class="sticky-bottom">
        <hr>
        <p class="text-center">A project by Ellard, Haris and Haydar</p>
    </div>
</footer>

</div>
</body>
</html>