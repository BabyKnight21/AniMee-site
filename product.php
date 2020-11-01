<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/columns.css">
</head>

  <!-- For every non-member page here onwards -->
  <!-- change nav bar "active" class -->
  <?php
include "dbconnect.php";
session_start();

if (isset($_POST['email']) && isset($_POST['password'])){
	$email = $_POST['email'];
	$enter_password = $_POST['password'];
	
	$hashedpassword = "SELECT `password` FROM customers WHERE `email`='$email' ";
	$result = mysqli_query($conn,$hashedpassword);
	$row=mysqli_fetch_assoc($result);
	$dbpassword=reset($row);

	//if (password_verify($enter_password, $dbpassword)) {
	if (sha1($enter_password)==$dbpassword){
	// Correct password
		// if valid user, assign session id
		$_SESSION['valid_user'] = $email;
	}
	mysqli_close($conn);
}
?>
<body>
<div class="topnavbar">
	<img src="holo_trans.png" width="80px" height="59px" align=left>
	<a href="index.php">Home</a>
	<a class="active" href="product.php">Products</a>
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
<!-- UNTIL HERE -->


<div class="container">
<div class="columns">
  <ul class="price">
    <li class="header">Figure</li>
    <li><img src="product/figure1.jpg" height="300px" width="240px"><br>Imported directly from Japan. Airflown even during COVID</li>
    <li class="blue"><a href="figures.php" class="button">BUY NOW</a></li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header" style="background-color:#4da6ff">Posters</li>
    <li><img src="product/poster2.jpg" height="300px" width="240px"><br>Printed using the lastest printing technology from North Spine!!</li>
    <li class="blue"><a href="posters.php" class="button">BUY NOW</a></li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header">Small Products</li>
    <li><img src="product/sticker1.png" height="300px" width="320px"><br>Get amazing stickers like above and your latest trending small goods here</li>
    <li class="blue"><a href="small.php" class="button">BUY NOW</a></li>
  </ul>
  <br>
</div>
</div>

<div class="containerpad20">
<h2 style="text-align:center">Don't hesitate, buy now</h2>
</div>

</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>