<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
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

<div style="padding left:50px; padding-bottom: 50px;">
	<h4>Before purchasing any of our goods, you are assumed to abide to our <a href="#">privacy policy</a> and our <a href="#TandS">Terms and Services</a></h4>

	<div id="#"></div>
	<h4>Privacy Policy</h4>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quam diam, efficitur a felis at, venenatis placerat mi. Proin elementum felis in ipsum sagittis, in cursus augue finibus. Nam ullamcorper, justo nec fringilla efficitur, mauris massa placerat ex, vel rhoncus velit eros placerat velit. Etiam sed augue risus. Donec turpis lacus, dignissim et varius a, scelerisque eu enim. Duis sagittis metus mauris, id molestie purus scelerisque id. Suspendisse et nulla varius, sollicitudin ex a, mattis arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec et lacus massa. Nam mollis lectus sit amet dui dictum facilisis. Pellentesque ac finibus lacus. Nullam placerat augue ac ex ultrices, blandit dignissim justo auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. <br> Phasellus molestie ligula eu hendrerit facilisis. Cras lobortis lectus leo, in bibendum mi fermentum id. Sed ipsum arcu, pretium sit amet est a, convallis dapibus tortor. Praesent non purus laoreet ante venenatis porttitor sed a risus. Vestibulum sed purus leo. Vestibulum quis pretium mi. Suspendisse pellentesque vestibulum consectetur. Nunc malesuada lectus sit amet orci fermentum accumsan. Donec posuere cursus imperdiet. In bibendum dapibus dolor, quis porttitor nisl viverra id. Praesent vitae nisl libero. Sed odio ipsum, efficitur quis congue id, bibendum a augue.<br> Integer dictum pellentesque mauris, in dignissim ante finibus sed. Nam sollicitudin elementum urna id facilisis. Fusce eleifend, justo hendrerit sodales interdum, nisi est egestas sem, in varius magna nunc eu arcu. Vivamus dui nunc, tincidunt sit amet leo a, tempor malesuada ipsum. Nullam et lorem nisi. Fusce vitae ligula pharetra, sollicitudin ipsum sit amet, vulputate nisl. Sed felis nulla, iaculis non eros quis, eleifend porttitor arcu. Sed erat lorem, molestie non consequat vel, suscipit et neque. Donec accumsan lectus vel imperdiet dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec tempor, ligula et vestibulum ultrices, sapien tellus ultrices orci, ac porttitor nulla magna id libero. Sed non mi sodales, mollis metus vel, dapibus diam. Quisque dignissim, risus a rutrum pharetra, mi diam feugiat lorem, vel tempor magna ipsum eu lorem. Nulla imperdiet libero quis euismod pulvinar.<br>

	<div id="TandS">
	<h4>Terms and Services</h4>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quam diam, efficitur a felis at, venenatis placerat mi. Proin elementum felis in ipsum sagittis, in cursus augue finibus. Nam ullamcorper, justo nec fringilla efficitur, mauris massa placerat ex, vel rhoncus velit eros placerat velit. Etiam sed augue risus. Donec turpis lacus, dignissim et varius a, scelerisque eu enim. Duis sagittis metus mauris, id molestie purus scelerisque id. Suspendisse et nulla varius, sollicitudin ex a, mattis arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec et lacus massa. Nam mollis lectus sit amet dui dictum facilisis. Pellentesque ac finibus lacus. Nullam placerat augue ac ex ultrices, blandit dignissim justo auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. <br> Phasellus molestie ligula eu hendrerit facilisis. Cras lobortis lectus leo, in bibendum mi fermentum id. Sed ipsum arcu, pretium sit amet est a, convallis dapibus tortor. Praesent non purus laoreet ante venenatis porttitor sed a risus. Vestibulum sed purus leo. Vestibulum quis pretium mi. Suspendisse pellentesque vestibulum consectetur. Nunc malesuada lectus sit amet orci fermentum accumsan. Donec posuere cursus imperdiet. In bibendum dapibus dolor, quis porttitor nisl viverra id. Praesent vitae nisl libero. Sed odio ipsum, efficitur quis congue id, bibendum a augue. <br> Integer dictum pellentesque mauris, in dignissim ante finibus sed. Nam sollicitudin elementum urna id facilisis. Fusce eleifend, justo hendrerit sodales interdum, nisi est egestas sem, in varius magna nunc eu arcu. Vivamus dui nunc, tincidunt sit amet leo a, tempor malesuada ipsum. Nullam et lorem nisi. Fusce vitae ligula pharetra, sollicitudin ipsum sit amet, vulputate nisl. Sed felis nulla, iaculis non eros quis, eleifend porttitor arcu. Sed erat lorem, molestie non consequat vel, suscipit et neque. Donec accumsan lectus vel imperdiet dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec tempor, ligula et vestibulum ultrices, sapien tellus ultrices orci, ac porttitor nulla magna id libero. Sed non mi sodales, mollis metus vel, dapibus diam. Quisque dignissim, risus a rutrum pharetra, mi diam feugiat lorem, vel tempor magna ipsum eu lorem. Nulla imperdiet libero quis euismod pulvinar. <br> Curabitur ornare varius eros, eget varius risus commodo aliquet. Mauris aliquet mauris ut lacus ornare, eu molestie dui bibendum. In sed condimentum lorem, quis elementum tortor. Phasellus velit ipsum, feugiat ultricies sem ac, rutrum tincidunt sem. Sed nec feugiat sem, eu facilisis mi. Aliquam suscipit facilisis nibh, sit amet rutrum odio. Integer tempus, leo eget aliquet aliquet, eros ex dignissim orci, tempor molestie turpis ante sit amet lacus. Vestibulum blandit ligula risus, at tincidunt enim porttitor eget. Etiam purus sapien, vestibulum eu turpis id, iaculis elementum neque. Sed vehicula faucibus lorem, vel lobortis ligula suscipit venenatis. Proin maximus lorem eros, in efficitur magna dapibus vitae. Nam risus nisi, viverra non semper non, cursus nec elit. Quisque laoreet suscipit gravida. In arcu risus, ornare sit amet euismod quis, rutrum quis libero. <br> Integer sodales arcu et felis consequat laoreet. Etiam vitae aliquet lacus, sed porttitor enim. Duis erat urna, gravida ut pharetra sed, pharetra sed arcu. Nulla dignissim dui sit amet nisi lacinia cursus. Nam tristique lacus id tempor dignissim. Mauris eu est eget urna euismod semper. Sed lobortis erat eros, eu commodo elit venenatis eu. Duis efficitur tincidunt efficitur. Vivamus ornare convallis elit, et sodales lacus semper bibendum. Nulla nisl leo, venenatis sed nisl vitae, pretium dictum nisi. Integer gravida pulvinar nisi ultrices aliquet. Integer facilisis quam ac est volutpat, eu blandit eros hendrerit. Quisque tortor lectus, mattis vitae eros at, suscipit pulvinar purus. Nam ut libero urna. Cras nec tellus quis mauris laoreet venenatis vitae at ipsum.
	</div>
</div>
</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>