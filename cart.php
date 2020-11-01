<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/checkout.css">
	<link rel="stylesheet" href="css/leftcolumns.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--fa-fa icons-->
</head>
<?php  //cart.php
session_start();
include "dbconnect.php";

if (!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}
if (isset($_GET['empty'])) {
	unset($_SESSION['cart']);
	header('location: ' . $_SERVER['PHP_SELF']);
	exit();
}
?>

<body>
<div class="topnavbar">
	<img src="holo_trans.png" width="80px" height="59px" align=left>
	<a href="index.php">Home</a>
	<a class='active' href="product.php">Products</a>
	<a href="orders.php">Orders</a>
	<a href="customercare.php">Customer Care</a>
	<a href="sitemap.php">Sitemap</a>
	<?php 
	if (isset($_SESSION['valid_user'])){
		echo "<a href='memberaccount.php'>".$_SESSION['valid_user']."'s Account</a>";
		echo "<a href='logout.php'>Log out</a>";
	}
	else{
		if (isset($email)){
			echo('Failed to log in. Please try again.');
			echo "<a id='myBtn' href='#'>Login</a>";
		}
		else {
		echo "<a id='myBtn' href='#'>Login</a>";
		}
	}
	?> 
</div>
<div class="logincontainer" id="popuplogin">
	<div class="logincontainer-content">
    <span class="close">&times;</span> 
		<form name="login" action="index.php" method="post">
		<h3> Login Page </h3>
		<p>Username:<input name="email" /><br>
		Password: <input name="password" type="password"><br>
		<input type="submit" name="submit" value="Login" />	
		</form>
		Don't have an account? <a href="registration1.php">Register Now!</a>
	</div>
</div> 
<!--external JS for login popup-->
<script src="login.js"></script>
<link rel="stylesheet" href="css/login.css">


<?php 
include "dbconnect.php";
$sql = "SELECT * FROM products";	
$result=mysqli_query($conn,$sql);

//array of product names and prices from db
$productarray = [];
$pricearray=[];
while($row = mysqli_fetch_array($result))
{
    $productarray[] = $row['productname'];
    $pricearray[] = $row['price'];
}

?>
<div class="checkoutcontainer">
  <h2>CART <i class="fa fa-shopping-cart"></i></h2>
  <span class="price" style="color:black"></span>
  <table border="2">
  <thead>
    <tr>
      <th>Product</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
  <?php
    //$session_cart array storing productid (not simplified)
    $cart_2d = array(array());
    $cart_2d_counter=0;
    for ($i=0; $i <count($_SESSION['cart']);$i++){
      $dup=false;
      for ($j=0; $j<count($cart_2d);$j++){
        //increase counter for dup item      
        if ($_SESSION['cart'][$i]==$cart_2d[$j]['id']){
          $dup=true;
          $cart_2d[$j]['count']+=1;
          break;
        }      
      }
      if ($dup==false){
        $cart_2d[$cart_2d_counter]['id']=$_SESSION['cart'][$i];
        $cart_2d[$cart_2d_counter]['count']=1;
        $cart_2d_counter+=1;
      }
    }
    
    $total = 0;
    for ($i=0; $i < count($cart_2d); $i++){
      echo "<tr>";
      echo "<th>" .$productarray[$cart_2d[$i]['id']-1]. "</th>";
      echo "<th>" .$cart_2d[$i]['count']. "</th>";
      echo "<th> $".number_format($pricearray[$cart_2d[$i]['id']-1]*$cart_2d[$i]['count'], 2). "</th>";
      echo "</tr>";
      $total = $total + $pricearray[$cart_2d[$i]['id']-1]*$cart_2d[$i]['count'];
    }      

  ?>
  </tbody>
  <tfoot>
  <tr>
    <th align='right'>Total:</th><br>
    <th align='right'>$<?php echo number_format($total, 2); ?></th>
  </tr>
  </table>
  

<a href='payment.php'><button class='btncart'><i class='fa fa-credit-card'></i>Continue to Checkout</button></a>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1"><button class='btnaddincart'><i class='fa fa-shopping-cart'></i>Empty your cart</button></a>

</div>


</div>
</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>