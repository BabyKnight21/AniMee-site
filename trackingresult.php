<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/checkout.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--fa-fa icons-->
</head>
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

<?php
    include "dbconnect.php";
	  $email=$_POST['email'];
    $order_num=$_POST['order'];

    
    $sql="SELECT orders.date,products.productname, orders.productid, 
    products.price, ifnull(sum(orders.quantity),0) as subquantity, 
    products.price*ifnull(sum(orders.quantity),0) as subtotal 
    FROM orders,products where orders.productid=products.productid 
    and orders.orderid='$order_num' and orders.email='$email' 
    group by products.productname asc";
    $details_sql="SELECT * FROM orderdetails where orderdetails.orderid ='$order_num'";

    $result=mysqli_query($conn, $sql);
    $details_result=mysqli_query($conn,$details_sql);
    if (mysqli_num_rows($result)<=0){
        //change styling for no result? font size style etc
        echo "<div class='checkoutcontainer'>";
        echo "<h3>No results found. Please check your entries.</h3><br>";
        echo "<a href='tracking.php'>Click here to try again!";
        echo "</div>";
    }
    else{
      $row=mysqli_fetch_assoc($result);    
      $tempdate=reset($row);
      $details_row=mysqli_fetch_assoc($details_result);
          
      echo "<div class='checkoutcontainer'>";
      echo "<h2>Your Order #".$order_num."<i class='fa fa-shopping-cart'></i></h2>";
      echo "<h3>Date of Purchase: ".$tempdate."</h3>";      
      echo "<h3>Recipient: ".$details_row['name']."</h3>";
      echo "<h3>Delivered to: ".$details_row['address']."</h3>";
    
      echo "<span class='price' style='color:black'></span>"; 
      //can change table id for css styling, now is inline
      echo "<table id='trackingresult_table' border='2'>";
      echo "<tr bgcolor='#e6ac00'>";
      echo '<th>Items</th>';
      echo '<th>Name</th>';
      echo '<th>Quantity</th>';
      echo '<th>Price</th>';
      echo "<th>Subtotal </th>";
      echo "</tr>";
      
      $totalsum=0;
      $count=1;  
      do{		
          echo "<tr bgcolor='#ffecb3'>";	
          echo "<th>".$count."</th>";	
          echo "<th>".$row['productname']."</th>";        
          echo "<th>".$row['subquantity']."</th>";
          echo "<th>".$row['price']."</th>";
          echo "<th>".$row['subtotal']."</th>";	
          echo "</tr>";		
          $totalsum+=$row['price']*$row['subquantity'];
          $count++;
      } while ($row=mysqli_fetch_assoc($result));
      
      echo "<tr><th colspan='5'  bgcolor='#e6ac00' >Total : $".$totalsum."</th></tr><br>";
      echo "</table>";
    }
    mysqli_close($conn);
    ?>
</div>
</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>