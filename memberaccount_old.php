<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--fa-fa icons-->
</head>
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
    <!-- need format for this left menu -->
	<h2 style="text-align:left"> Quick Links: </h2>  
    <a href="memberaccount.php"><h3 style="text-align:left">Profile</h3></a>
    <a href="pastorders.php"><h3 style="text-align:left">Past Orders</h3></a>
</nav>
<?php
    include "dbconnect.php";
    session_start();
    $email=$_SESSION['valid_user'];
    
    $sql="SELECT `customername`,`email`,`mobile`,`joindate`,`customeraddress` FROM customers where email='$email'"; 
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);    
        
    // need format for this table (till b4 mysqli_close($conn)) 
    echo "<div class='checkoutcontainer'>";
    echo "<table border='1'";
    echo "<tr>";
    echo "<th> Full Name </th>";
    echo "<th> Mobile </th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>".$row['customername']."</th>";
    echo "<th>".$row['mobile']."</th>";
    echo "</tr>";
    
    echo "<tr></tr><tr>";
    echo "<th> Email Address </th>";
    echo "<th> Member Since </th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>".$row['email']."</th>";
    echo "<th>".$row['joindate']."</th>";
    echo "</tr>";


    echo "<tr >";
    echo "<th> Address (if Applicable) </th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th colspan='2'>".$row['customeraddress']."</th>";
    echo "</tr>";
    
    echo "</table>";
    
    mysqli_close($conn);
    ?>
</div>
</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>