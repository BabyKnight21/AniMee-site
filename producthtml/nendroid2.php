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
  $servername = "localhost";
  $username = "f33ee";
  $password = "f33ee";
  $dbname = "f33ee";

  $conn=mysqli_connect($servername,$username,$password,$dbname);
  if (!$conn){
    die("Connection failed: " . mysqli_connct_error());
  }

  $sql = "SELECT * FROM products WHERE productid=4";	
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
?>
<body>
<div class="topnavbar">
	<img src="../holo_trans.png" width="80px" height="59px" align=left>
	<a href="../index.html">Home</a>
	<a class="active" href="../product.html">Products</a>
	<a href="../orders.php">Orders</a>
	<a href="../customercare.html">Customer Care</a>
	<a href="../sitemap.html">Sitemap</a>
	<a href="../login.html">Login</a>
</div>

<nav>
	<h2 style="text-align:left"> Quick Links: </h2>
	<ul class="none">
	<li> 
  <h3>Figurines</h3>
    <ul>
      <h5 style="text-align:left">
        <li><a href="../figures.html">1/7 Scale</a></li>
        <li><a href="../figures.html#nendroid">Nendroid</a></li>
      </h5>
    </ul>
  </li>
	<li> 
  <h3>Posters</h3>
    <ul class="circle">
      <h5 style="text-align:left">
        <li><a href="../posters.html#wallpaper">Wallpaper</a></li>
        <li><a href="../posters.html#poster">Mini Poster</a></li>
      </h5>
    </ul>
  </li>
	<li>	
	<h3>Small items</h3>
		<ul>
			<h5 style="text-align:left">
				<li><a href="../small.html">Keychain</a></li>
				<li><a href="../small.html#acrylic">Acrylic Goods</a></li>
				<li><a href="../small.html#casing">Phone Casing</a></li>
			</h5>
		</ul>
	</li>
	</ul>
</nav>

<main>
<table width=100% height=1000px>
<thead>
  <tr>
    <th width=40%><img src="../product/nendroid2.jpg" width=600px height=700px></th>
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
      <tr>
        <td colspan="2"><h5 style="text-align:left">Please note that images shown may differ from the final product. <br>
      Paintwork is done partially by hand and therefore final products may vary. </h5></td>
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
    <td colspan="2" style="text-align:left; text-align:justify;"><h2>Description: </h2>Umaru from Himouto! Umaru-chan<br>
    10 cm tall, Nendoroid line-up.<br>
    Comes with display base, cola bottle, chips, interchangeable body parts and gaming console.</td>
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