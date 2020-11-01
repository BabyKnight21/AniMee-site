<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<style>
	input{
		height:50px;
		width:30%;
		font-size: 20px;
	}
</style>
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
	<a href="product.php">Products</a>
	<a class="active" href="orders.php">Orders</a>
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


<div style="text-align:center; font-size:x-large; float:inline start; float:left; padding:30px 0px 30px 20%">
Ready to checkout?<br>
<img src="payingmoney.jpg" height=300px width=500px>
<!--Img src: https://knowyourmeme.com/memes/yuu-buys-a-cookie-->
<form action="cart.php">
<input type="submit" value="Go to Cart" style="width:250px">
</form>
</div>

<div style="text-align:center; font-size:x-large; padding:30px 300px 30px 0px">
Ordered something before?<br>
<img src="thinking.png" height=300px width=500px>
<!--Img src:https://www.pngkey.com/png/detail/315-3152007_png-animuthinku-thinking-meme-face-anime.png-->
<form action="tracking.php">
<input type="submit" value="Track Previous Order" style="width:400px">
</form>
</div>
</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>