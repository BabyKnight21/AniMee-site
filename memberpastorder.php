<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/accountcolumns.css">
</head>
<?php
	include "dbconnect.php";
	session_start();
	$email=$_SESSION['valid_user'];
?>
<style>
	td {
		text-align:left;
	}
</style>
<body>
<div class="topnavbar">
	<img src="holo_trans.png" width="80px" height="59px" align=left>
	<a href="index.php">Home</a>
	<a href="product.php">Products</a>
	<a href="orders.php">Orders</a>
	<a href="customercare.php">Customer Care</a>
    <a href="sitemap.php">Sitemap</a>
    <?php
        $email=$_SESSION['valid_user'];
        echo "<a href='memberaccount.php'>".$email."'s Account</a>";
        echo "<a href='logout.php'>Log out</a>";
    ?>
</div>
<nav> 
<a href="memberaccount.php">Profile </a><br>
<a href="memberpastorder.php">Past Orders</a>
</nav>
<?php
    include "dbconnect.php";
    session_start();
    $email=$_SESSION['valid_user'];
    $sql =
	"SELECT orders.orderid,orders.date,products.productname, products.price, orders.quantity, products.price*orders.quantity as subtotal 
	 FROM orders,products where orders.email='".$email."' and orders.productid=products.productid 
	 group by orders.date desc, orders.tablecount desc";	

	$result=mysqli_query($conn,$sql); 
?>

	<table width=70% height="500px" style="padding-left:40px">
	<thead>
	<h2 style="text-align:center">HERE ARE YOUR PAST ORDERS</h2>
	</thead>
	<tbody>
	<?php	
		$row=mysqli_fetch_assoc($result);
		$currentorder=reset($row);
		echo "<table id='totalsalestable' border='0'>";
		echo "<tr bgcolor='lightblue'>";
		echo "<th>Order #".$currentorder."</th></tr>";
		echo "<tr bgcolor='#e6ac00'><th colspan='2'>Product Name</th>";
		echo "<th>Price </th>";
		echo "<th>Quantity </th>";
		echo "<th>Subtotal </th>";
		echo "</tr>";

			
		$counter=1;		
		do{
			if ($currentorder!=$row['orderid']){
				$counter=1;
				$currentorder=$row['orderid'];
				echo "<tr bgcolor='lightblue'>";
				echo "<th>Order #".$currentorder."</th></tr>";
				echo "<tr bgcolor='#e6ac00'><th colspan='2'>Product Name</th>";
				echo "<th>Price </th>";
				echo "<th>Quantity </th>";
				echo "<th>Subtotal </th>";
				echo "</tr>";
			}				
			echo "<tr bgcolor='#ffecb3'>";	
			echo "<th>".$counter."</th>";
			echo "<th>".$row['productname']."</th>";
			echo "<th>".$row['price']."</th>";
			echo "<th>".$row['quantity']."</th>";
			echo "<th>".$row['subtotal']."</th>";	
			echo "</tr>";		
			$counter++;			
		} while ($row=mysqli_fetch_assoc($result));
		
		

	mysqli_close($conn);
	?>  

	</tbody>
</table>
<br>
</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>