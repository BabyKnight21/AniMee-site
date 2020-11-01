<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
<!--THIS STYLESHEET IS DIFFERENT FROM index-->
	<link rel="stylesheet" href="css/leftcolumns.css">
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

<nav>
	<h2 style="text-align:left"> Quick Links: </h2>
	<ul class="none">
  <li>  
  <h3 style="text-align:left">Figurines</h3>
    <ul>
      <h5 style="text-align:left">
        <li><a href="figures.php">1/7 Scale</a></li>
        <li><a href="figures.php#nendroid">Nendroid</a></li>
      </h5>
    </ul>
  </li>  
	<li>	
	<h3 style="text-align:left">Posters</h3>
		<ul class="circle">
			<h5 style="text-align:left">
				<li><a href="#wallpaper">Wallpaper</a></li>
				<li><a href="#poster">Mini Poster</a></li>
			</h5>
		</ul>
	</li>
	<li>	
	<h3 style="text-align:left">Small items</h3>
		<ul>
			<h5 style="text-align:left">
				<li><a href="small.php">Keychain</a></li>
        <li><a href="small.php#acrylic">Acrylic Goods</a></li>
        <li><a href="small2.php#casing">Phone Casing</a></li>
			</h5>
		</ul>
	</li>
	</ul>
</nav>

<main>
<table width=100% height=1000px>
<thead>
  <h2 style="text-align:center">BROWSE OUR LATEST COLLECTION</h2>
</thead>
<tbody>
  <tr><div id="wallpaper"></div>
    <th>Wallpaper 1</th>
    <td></td>
    <th>Wallpaper 2</th>
    <td></td>
    <th>Wallpaper 3</th>
    <td></td>
  </tr>
  <tr>
    <td><img src="product/wallpaper1.png" height="300px" width="500px"></td>
    <td></td>
    <td><img src="product/wallpaper2.jpg" height="300px" width="500px"></td>
    <td></td>
    <td><img src="product/wallpaper3.jpg" height="300px" width="500px"></td>
    <td></td>
  </tr>
  <tr>
    <td><form action="producthtml/wallpaper1.php"><input type="submit" class="toproductbutton" value="Go to Product"></form></td>
    <td></td>
    <td><form action="producthtml/wallpaper2.php"><input type="submit" class="toproductbutton" value="Go to Product"></form></td>
    <td></td>
    <td><form action="producthtml/wallpaper3.php"><input type="submit" class="toproductbutton" value="Go to Product"></form></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>Poster 1</th>
    <th></th>
    <th>Poster 2</th>
    <th></th>
    <th>Poster 3</th>
    <th></th>
  </tr>
  <tr>
    <td><img src="product/poster1.jpg" height="300px" width="240px"></td>
    <td></td>
    <td><img src="product/poster2.jpg" height="300px" width="240px"></td>
    <td></td>
    <td><img src="product/poster3.png" height="300px" width="240px"></td>
    <td></td>
  </tr>
  <tr>
    <td align="center"><form action="producthtml/poster1.php">
  	<input type="submit" class="toproductbutton" value="Go to Product">
	</form></td>
    <td><div id="poster"></div></td>
    <td align="center"><form action="producthtml/poster2.php">
  	<input type="submit" class="toproductbutton" value="Go to Product">
	</form></td>
    <td></td>
    <td align="center"><form action="producthtml/poster3.php">
  	<input type="submit" class="toproductbutton" value="Go to Product">
	</form></td>
    <td></td>
  </tr>
</tbody>
</table>

</main>

</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>