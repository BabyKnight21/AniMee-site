<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/login.css">

	<!-- For every non-member page here onwards -->
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
	<a class="active"href="index.php">Home</a>
	<a href="product.php">Products</a>
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


<div id="rightcolumn">
	<h3 style="text-align:center"> ON SALE </h3>
	<ul>
	<li>	
	<img src="product/poster1.jpg" width="99px" height="102x" align=center>
	<br>
	<strike>$100 </strike><b>$50</b>
	</li>
	<li>
	<img src="product/acrylic stand 1.jpg" width="99px" height="102x" align=center>
	<br>
	<strike>$130 </strike><b>$100</b>
	</li>
	<li>
	<img src="product/sticker1.png" width="99px" height="102x" align=center>
	<br>
	<strike>$2.50 </strike><b>$2</b>
	</li>
	</ul>

</div>
<div id="leftcolumn">
	
<h2 style="text-align:center">You have found <font color="blue">AniMeeeee!!! </font><br>The best place to shop for anime goods </h2>
<div class="container" style="text-align:center">
	<img src="money.jpg" width="555px" height="321px" align=center>
<h3 style="text-align:center"> Come spend your money with us today :) </h3>（ ﾟ Дﾟ)ノ[ ($) ]
</div>
</div>


</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>