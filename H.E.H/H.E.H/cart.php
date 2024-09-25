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
     
     
     };
     
     if(isset($_POST['update_cart'])){
        $update_quantity = $_POST['cart_quantity'];
        $update_id = $_POST['cart_id'];
        mysqli_query($conn, "UPDATE `orderid` SET productquantity = '$update_quantity' WHERE orderid = '$update_id'") or die('query failed');
        $popup[] = 'cart quantity updated successfully!';
     }
     
     if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM `orderid` WHERE orderid = '$remove_id'") or die('query failed');
        header('location:cart.php');
     }
       
     if(isset($_GET['delete_all'])){
        mysqli_query($conn, "DELETE FROM `orderid` WHERE userid = '$user_id'") or die('query failed');
        header('location:cart.php');
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
                <a href="cart.php" class="nav-item nav-link active"><i class="bi-cart"></i> Cart</a>
    <a href="confirmationlogin.php" class="nav-item nav-link"><i class="bi-person-circle"></i> <?= htmlspecialchars($user["username"]) ?></a>
<?php else: ?>
    <a href="cart.php" class="nav-item nav-link active"><i class="bi-cart"></i> Cart</a>
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
        <h1 class="text-center text-white">Checkout</h1>
        <p class="text-white text-center">Complete your order! </p>
    </div>
    <?php
if(isset($popup)){
   foreach($popup as $popup){
      echo '<div class="popup" onclick="this.remove();">'.$popup.'</div>';
   }
}
?>



</div>
<?php if(isset($user)): ?>
   <h1 class="text-center"><?= htmlspecialchars($user["username"]) ?>'s shopping cart</h1>
   <div class="table-responsive"> 
   <table class="table-responsive">
   <table class="table">
    <thead class="table-light">
         <th>Product image</th>
         <th>Product Name</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Total price</th>
         <th>Action</th>
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `orderid` WHERE userid = '$user_id'") or die('The query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="90" alt=""></td>
            <td><?php echo $fetch_cart['productname']; ?></td>
            <td>£<?php echo $fetch_cart['productprice']; ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['orderid']; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['productquantity']; ?>">
                  <input type="submit" name="update_cart" value="Update cart" class="btn btn-info">
               </form>
            </td>
            <td>£<?php echo $sub_total = ($fetch_cart['productprice'] * $fetch_cart['productquantity']); ?></td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['orderid']; ?>" class="btn btn-danger bi-trash">Remove</a></td>
            </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<hr> <h6 class=text-center><b>No items have been added to your shopping cart</b><h6>';
         }
      ?>
      <tr>
         <td colspan="4"></td>
         <td>£<?php echo $grand_total; ?></td>
         <td><a href="cart.php?delete_all" class="btn btn-danger bi-trash-fill <?php echo ($grand_total > 1)?'':'disabled'; ?>">Clear all</a></td>
      </tr>
   </tbody>
   </table>
   <div class="text-center">
      <a href="checkout.php" class=" btn btn-primary bi-check-circle-fill <?php echo ($grand_total > 1)?'':'disabled'; ?>"> Checkout</a>
        </div>
<?php else: ?>
    <h1 class="text-center">You need to login to access your shopping cart.</h1>
    <div class=text-center>
    <a href="login.php" class="btn btn-primary bi-person-circle"> Login</a>
</div>
    <?php endif; ?>


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