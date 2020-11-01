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
        <li><a href="#1/7">1/7 Scale</a></li>
        <li><a href="#nendorid">Nendroid</a></li>
      </h5>
    </ul>
  </li>  
	<li>	
	<h3 style="text-align:left">Posters</h3>
		<ul class="circle">
			<h5 style="text-align:left">
				<li><a href="posters.php">Wallpaper</a></li>
				<li><a href="posters.php#poster">Mini Poster</a></li>
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
  <h2 style="text-align:center">PERFECT FIT FOR YOUR COLLECTION BIG OR SMALL</h2>
</thead>
<tbody>
  <tr>
    <div id="figure"></div>
    <th>Figure 1</th>
    <th></th>
    <th>Figure 2</th>
    <th><div id="nendroid"></div></th>
    <th>Nendroid 1</th>
    <th></th>
  </tr>
  <tr>
    <td><img src="product/figure1.jpg" height="350px" width="250px"></td>
    <td></td>
    <td><img src="product/figure2.jpg" height="350px" width="250px"></td>
    <td></td>
    <td><img src="product/nendroid1.jpg" height="350px" width="250px"></td>
    <td></td>
  </tr>
  <tr>
    <td width="500px" align="center"><form action="producthtml/figure1.php">
  	<input type="submit" class="toproductbutton" value="Go to Product">
	   </form></td>
    <td></td>
    <td width="500px" align="center"><form action="producthtml/figure2.php">
  	<input type="submit" class="toproductbutton" value="Go to Product">
	   </form></td>
    <td></td>
    <td width="500px" align="center"><form action="producthtml/nendroid1.php">
  	<input type="submit" class="toproductbutton" value="Go to Product">
	   </form></td>
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
    <th>Nendroid 2</th>
    <td></td>
    <th></th>
    <td></td>
    <th></th>
    <td></td>
  </tr>
  <tr>
    <td><img src="product/nendroid2.jpg" height="350px" width="250px"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><form action="producthtml/nendroid2.php">
    <input type="submit" class="toproductbutton" value="Go to Product"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
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
</tbody>
</table>

</main>

</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>