<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee Registration</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="style.css">    
	<link rel="stylesheet" href="css/checkout.css">
</head>
<script language="JavaScript" type="text/javascript">
	function login(toggle){
		if(toggle == "show"){
			document.getElementById('popuplogin').style.visibility="visible";
		}else if(toggle == "hide"){
			document.getElementById('popuplogin').style.visibility="hidden"; 
		}
	}
</script>
<body>
<div class="topnavbar">
	<img src="holo_trans.png" width="80px" height="59px" align=left>
	<a class="active"href="index.html">Home</a>
	<a href="product.html">Products</a>
	<a href="orders.html">Orders</a>
	<a href="customercare.html">Customer Care</a>
	<a href="sitemap.html">Sitemap</a>
	<a href="javascript:login('show');">Login</a>
	<div id="popuplogin" style="visibility:hidden"> 
		<form name="login" action="login.php" method="post">
		<tr>Username:<input name="email" /></tr>
		<tr>Password:<input name="password" type="password" size="3o"/></tr>
		<input type="submit" name="submit" value="Login" />	
		</form>
		<a href="javascript:login('hide');">Close Popup</a>
		<a href="registration.php">Register Now!</a>
	</div> 
</div>
<div class="checkoutcontainer">
    <?php 
        $servername = "localhost";
        $username = "f33ee";
        $password = "f33ee";
        $dbname = "f33ee";
        $conn=mysqli_connect($servername,$username,$password,$dbname);
        if (!$conn){
            die("Connection failed: " . mysqli_connct_error());
        }

        $email = $_POST['email'];
        $password = $_POST['password1'];
        $password2 = $_POST['password2'];

        if ($password != $password2) {
            echo "Sorry! Passwords do not match <br>";
            echo"<a href='registration1.html'>Click here to try again</a>";
            exit;
        }
        
        $checkduplicate_email="SELECT * FROM customers where `email`='$email'";
        $checkdup=mysqli_query($conn,$checkduplicate_email);
        $checkrows=mysqli_num_rows($checkdup);
        if ($checkrows>0){
            echo "Sorry! Email already registered! <br>";
            echo"<a href='registration1.html'>Click here to try again</a>";
            exit;
        }
        //encrypt 
        $password=sha1($password);
        //get join date, php server date is 1day behind???
        //$joindate=date("Y-m-d");
        $joindate=date('Y-m-d', strtotime(' +1 day'));
        $sql = "INSERT INTO customers(`email`,`password`,`membertype`,`joindate`) 
        VALUES ('$email','$password','member','$joindate')";
        $result= mysqli_query($conn,$sql);
        if (!result){
            echo "Sorry! Failed to create account. Duplicate email exists. <br>";
            echo "<a href='registration1.html'>Click here to try again</a>";
        }
        else{
            echo "Welcome to AniMee, ". $email . ". You are now registered. Join Date: ".$joindate;
            echo "<a href='product.html'>Start Shopping Now!</a>";
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