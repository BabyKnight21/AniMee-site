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

  $sql = "SELECT * FROM products WHERE productid=6";	
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
  <a class='active' href="../product.php">Products</a>
  <a href="../orders.php">Orders</a>
  <a href="../customercare.php">Customer Care</a>
  <a href="../sitemap.php">Sitemap</a>
  <?php 
  if (isset($_SESSION['valid_user'])){
    echo "<a href='../memberaccount.php'>".$_SESSION['valid_user']."'s Account</a>";
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
				<li><a href="../small.php#casing">Phone Casing</a></li>
			</h5>
		</ul>
	</li>
	</ul>
</nav>

<main>
<table width=100% height=700px>
<thead>
  <tr>
    <th width=40%><img src="../product/wallpaper2.jpg" width=1000px height=550px></th>
    <td width=60%>
    <table height=300px style="padding:20px 20px 20px 20px">
    <tr><h1><?php echo $row['productname'];?></h1></tr>
      <tr>
        <td><h3>Designed on: <?php echo $row['source'];?> </h3></td>
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
      <tr>
        <td colspan="2"><h5 style="text-align:left">Please note that images shown may differ from the final product. <br>
      Paintwork is done using Adobe Photoshop CS4</h5></td>
      </tr>
      <tr><td>
      <?php
      if ($row['stock'] == 0){
        echo "<button disabled class='btnadd'> Out of Stock</div>";
      }
      else{
        echo "<form action='add.php'>
        <button class='btnadd'><i class='fa fa-shopping-cart'></i> Add to Cart</button>";
      }
      ?>
      <form action="cart.php">
      <button class="btncart"><i class="fa fa-credit-card"></i> Go to Cart</button><!---HERE-->
      </form></td>   
      </tr>
    </table>
  </tr>
</thead>
<tbody>
  <tr>
    <td colspan="2" style="text-align:left; text-align:justify;"><h2>Description: </h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis elit dui. Curabitur non lectus iaculis ex condimentum condimentum vitae eu enim. Suspendisse felis magna, varius ut mattis id, luctus consectetur ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin id est id arcu iaculis commodo sed quis massa. Curabitur vulputate, turpis eget malesuada lobortis, felis felis semper nisi, at consectetur libero ex quis sapien. Suspendisse gravida viverra mi. <br> Maecenas quis ligula eu dolor cursus dictum vel at sem. Duis vitae purus facilisis, sodales lacus sed, sagittis erat. Maecenas erat nisl, laoreet sed orci id, fringilla vestibulum ipsum. Praesent lacinia sem eget dui blandit maximus. Integer et iaculis urna. Duis mattis elit sed lorem condimentum, non commodo libero scelerisque. Vivamus imperdiet semper lobortis. Duis scelerisque ligula et augue porttitor porta. In hac habitasse platea dictumst. Nullam sed sodales turpis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis sit amet odio risus. Vivamus laoreet aliquet auctor.</td>
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