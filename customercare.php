<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/checkout.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--fa-fa icons-->
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
	<a href="product.php">Products</a>
	<a href="orders.php">Orders</a>
	<a class="active" href="customercare.php">Customer Care</a>
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
<h2 style="text-align:center">WECARE@AniMee</h2>
<div class="checkoutcontainer">

<h3>Feedback Form</h3>
<form action="mailto:animeee@eee.com.sg">
  <label for="fname"><i class="fa fa-user"></i> Full Name</label>
  <input type="text" id="fname" name="firstname" placeholder="Alan McFergurson">
  <label for="email"><i class="fa fa-envelope"></i> Email</label>
  <input type="text" id="email" name="email" placeholder="alan@example.com">
  <label for="address"><i class="fa fa-comments-o"></i> Feedback</label>
  <input type="text" id="adr" name="address" placeholder="Write your feedback here">
<div>
	<input type="submit" value="Give Feedback">
</div>
</form>

<table>
	<tr>
		<td><a href='FAQ.php'>FAQ</a></td>
		<td><a href='PrivacyPolicy.php'>Privacy Policy</a></td>
		<td><a href='PrivacyPolicy.php#TandS'>Terms & Services</a></td>
</table>

</div>
</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>