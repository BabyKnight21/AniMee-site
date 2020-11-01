<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/checkout.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--fa-fa icons-->
</head>
<body>
<div class="topnavbar">
	<img src="holo_trans.png" width="80px" height="59px" align=left>
	<a href="index.php">Home</a>
	<a class='active' href="product.php">Products</a>
	<a href="orders.php">Orders</a>
	<a href="customercare.php">Customer Care</a>
	<a href="sitemap.php">Sitemap</a>
  <?php 
  session_start();
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


<form action="confirmation.php" method="POST"> <!-- insert confirmation form here-->
<div class="checkoutcontainer">
<h2>CART</h2>
  <h3>Billing Address</h3>
  <label for="fname"><i class="fa fa-user"></i> Full Name</label>
  <input type="text" id="fname" name="fullname" placeholder="Alan McFergurson">
  <label for="email"><i class="fa fa-envelope"></i> Email</label>
  <input type="text" id="email" name="email" placeholder="alan@example.com">
  <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
  <input type="text" id="adr" name="address" placeholder="1 Nanyang Crescent">
</div>

<div class="checkoutcontainer">
  <h3>Payment</h3>
  <div>
    <i class="fa fa-cc-visa fa-3x" style="color:navy"></i>
    <i class="fa fa-cc-mastercard fa-3x" style="color:orange"></i>
    <i class="fa fa-paypal fa-3x" style="color:blue"></i>
  </div>
</div>

<input type="submit" value="Continue to payment" class="greencheckoutbutton" a href="confirmation.php"> 
</form>

</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>