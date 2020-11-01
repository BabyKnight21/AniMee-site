<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/login.css">
<body>
<div class="topnavbar">
	<img src="holo_trans.png" width="80px" height="59px" align=left>
	<a class="active"href="index.php">Home</a>
	<a href="product.html">Products</a>
	<a href="orders.html">Orders</a>
	<a href="customercare.html">Customer Care</a>
	<a href="sitemap.html">Sitemap</a>
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
    <?php
    session_start();
    
    // store to test if they *were* logged in
    $old_user = $_SESSION['valid_user'];  
    unset($_SESSION['valid_user']);
    session_destroy();

    if (!empty($old_user)){
        echo "<h2>You have been logged out.</h2>";
    }
    else {
        echo "<h2>You were not logged in.</h2>";
    }
    ?>
    <h2><a href="index.php">Click here to go back to main page</a></h2>

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
		Don't have an account? <a href="registration1.html">Register Now!</a>
	</div>
</div> 

<!--Put in external JS-->
<script src="login.js"></script>


</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>