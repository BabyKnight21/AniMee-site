<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/accountcolumns.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--fa-fa icons-->
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
    $sql="SELECT `customername`,`email`,`mobile`,`joindate`,`customeraddress` FROM customers where email='$email'"; 
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);    
?>
<table width=70% height="200px" style="padding-left:40px">
	<thead>
		<h2 style="text-align:center">HERE ARE YOUR ACCOUNT DETAILS</h2>
	</thead>
	<tbody>		
		<tr>
			<td><h4>Email Address:</h4></td>
			<td><h4>Member Since: </h4></td>
		</tr>
		<tr><?php
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['joindate']."</td>";?>
		<tr>
		<tr colspan="2">
			<td><h4>Address (if applicable)</h4></td>
		</tr>
		<tr colspan="2">
			<td>Nil</td>
		</tr>
	</tbody>
</table>
<?php mysqli_close($conn);?>
</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>