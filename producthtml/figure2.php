<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
<!--THIS STYLESHEET IS DIFFERENT FROM index-->
	<link rel="stylesheet" href="../css/leftcolumns.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  h3 {
    text-align: left;
  }
</style>
<?php
  include "../dbconnect.php";

  $sql = "SELECT * FROM products WHERE productid=2";	
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
?>

<?php
include "../dbconnect.php";
session_start();

if (isset($_POST['email']) && isset($_POST['password'])){
	$email = $_POST['email'];
	$enter_password = $_POST['password'];
	
	$hashedpassword = "SELECT `password` FROM customers WHERE `email`='$email' ";
	$result2 = mysqli_query($conn,$hashedpassword);
	$row2=mysqli_fetch_assoc($result);
	$dbpassword=reset($row2);

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
	<img src="../holo_trans.png" width="80px" height="59px" align=left>
	<a href="../index.php">Home</a>
	<a href="../product.php">Products</a>
	<a href="../orders.php">Orders</a>
	<a href="../customercare.php">Customer Care</a>
	<a href="../sitemap.php">Sitemap</a>
	<?php 
	if (isset($_SESSION['valid_user'])){
		echo "<a class='active' href='../memberaccount.php'>".$_SESSION['valid_user']."'s Account</a>";
		echo "<a href='../logout.php'>Log out</a>";
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
		<form name="login" action="../index.php" method="post">
		<h3> Login Page </h3>
		<p>Username:<input name="email" /><br>
		Password: <input name="password" type="password"><br>
		<input type="submit" name="submit" value="Login" />	
		</form>
		Don't have an account? <a href="registration1.php">Register Now!</a>
	</div>
</div> 
<!--external JS for login popup-->
<script src="../login.js"></script>
<link rel="stylesheet" href="../css/login.css">

<!-- To here -->
<?php //cart
if (!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}
if (isset($_GET['buy'])) {
	$_SESSION['cart'][] = $_GET['buy'];
	header('location: ' . $_SERVER['PHP_SELF']. '?' . SID);
	exit();
}
?>
<nav>
	<h2 style="text-align:left"> Quick Links: </h2>
	<ul class="none">
	<li> 
  <h3>Figurines</h3>
    <ul>
      <h5 style="text-align:left">
        <li><a href="../figures.php">1/7 Scale</a></li>
        <li><a href="../figures.php#nendroid">Nendroid</a></li>
      </h5>
    </ul>
  </li>
	<li> 
  <h3>Posters</h3>
    <ul class="circle">
      <h5 style="text-align:left">
        <li><a href="../posters.php#wallpaper">Wallpaper</a></li>
        <li><a href="../posters.php#poster">Mini Poster</a></li>
      </h5>
    </ul>
  </li>
	<li>	
	<h3>Small items</h3>
		<ul>
			<h5 style="text-align:left">
				<li><a href="../small.php">Keychain</a></li>
				<li><a href="../small.php#acrylic">Acrylic Goods</a></li>
				<li><a href="../small2.php#casing">Phone Casing</a></li>
			</h5>
		</ul>
	</li>
	</ul>
</nav>

<main>
<table width=100% height=1000px>
<thead>
  <tr>
    <th width=40%><img src="../product/figure2.jpg" width=600px height=700px></th>
    <td width=60%>
    <table height=300px style="padding:20px 20px 20px 20px">
    <tr><h1><?php echo $row['productname'];?></h1></tr>
      <tr>
        <td><h3>Manufacturer: <?php echo $row['source'];?> </h3></td>
      </tr>
      <tr>
        <td><h3>Category: <?php echo $row['producttype'];?> </h3></td>
      </tr>
      <tr>
        <td><h3>Author: <?php echo $row['author'];?> </h3></td>
      </tr>
      <tr>
        <td><h3>Price: $<?php echo $row['price'];?></h3></td>
      </tr>
      <tr>
        <td><h3>Quantity: <?php echo $row['stock'];?></h3></td>
      </tr>
      <tr><td>
      <?php
      $thispageid=2;
      include "stockcheck.php";
      if (!$_SESSION['valid_user']){
        echo "<button disabled class='btnadd'>Please Login First To Purchase</div>";
      }
      else{
        if ($row['stock'] == 0){
          echo "<button disabled class='btnadd'> Out of Stock</div>";
        }
      
        else if ($notenough==true){
           echo "<button disabled class='btnadd'>Insufficient Stock</div>";  
        }
        else{
          echo "<button class='btnadd'><a href='" .$_SERVER['PHP_SELF']. "?buy=2' style='text-decoration: none; color:white'><i class='fa fa-shopping-cart'></i> Add to Cart</a></ button>";
        }
        echo "<a href='../cart.php'><button class='btncart'><i class='fa fa-credit-card'></i></a>  Go to Cart</button>";
      }
      ?>
      
      </td>        
      </tr>
      <tr><td>
      Your cart contains <?php echo count($_SESSION['cart']); ?> items.
      </td></tr>
    </table>
  </tr>
</thead>
<tbody>
  <tr>
    <td colspan="2" style="text-align:left; text-align:justify;"><h2>Description: </h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies enim nec facilisis blandit. Morbi et diam dapibus, auctor erat viverra, convallis dui. Sed lacinia ex a mauris elementum viverra. Vivamus at felis dictum, ultricies turpis ac, viverra dui. Fusce porta augue id mauris varius, at fringilla eros varius. Pellentesque egestas augue neque, quis vulputate odio bibendum id. Quisque vel tellus risus.<br>Vestibulum ac commodo lectus. Proin ac posuere odio. Nulla facilisi. Fusce luctus nunc ipsum, ut semper magna suscipit nec. Proin non aliquam elit. Fusce mattis vehicula pellentesque. Ut dictum purus metus, sed sagittis lorem fermentum id.<br>Suspendisse consectetur, libero auctor posuere tincidunt, turpis est iaculis sapien, vel porttitor turpis sem sed erat. Praesent at tellus eu nisl lobortis vehicula nec quis leo. Donec quis cursus odio. Phasellus id purus tincidunt, commodo lectus nec, sollicitudin libero. Etiam gravida tortor sit amet pulvinar euismod. Quisque feugiat massa id mi consequat efficitur. Cras maximus commodo fermentum. Morbi enim lectus, consectetur tempor lectus vitae, viverra congue ex.</td>
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