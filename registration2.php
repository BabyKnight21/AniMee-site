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
	<a href="index.php">Home</a>
	<a href="product.php">Products</a>
	<a href="orders.php">Orders</a>
	<a href="customercare.php">Customer Care</a>
	<a href="sitemap.php">Sitemap</a>
    <a class="active" href="#">Register</a>
    
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


<link rel="stylesheet" href="css/login.css">

<div class="checkoutcontainer">
    <?php 
        include "dbconnect.php";

        $email = $_POST['email'];
        $password = $_POST['password1'];
        $password2 = $_POST['password2'];

        if ($password != $password2) {
            echo "Sorry! Passwords do not match <br>";
            echo"<a href='registration1.php'>Click here to try again</a>";
            exit;
        }
        
        $checkduplicate_email="SELECT * FROM customers where `email`='$email'";
        $checkdup=mysqli_query($conn,$checkduplicate_email);
        $checkrows=mysqli_num_rows($checkdup);
        if ($checkrows>0){
            echo "Sorry! Email already registered! <br>";
            echo"<a href='registration1.php'>Click here to try again</a>";
            exit;   
        }
        //encrypt 
        //$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $hashedpassword=sha1($password2);

        //get join date, php server date is 1day behind???
        //$joindate=date("Y-m-d");
        $joindate=date('Y-m-d', strtotime(' +1 day'));
        $sql = "INSERT INTO customers(`email`,`password`,`membertype`,`joindate`) 
        VALUES ('$email','$hashedpassword','member','$joindate')";
        $result= mysqli_query($conn,$sql);
        if (!result){
            echo "Sorry! Failed to create account. Duplicate email exists. <br>";
            echo "<a href='registration1.php'>Click here to try again</a>";
        }
        else{
            echo "Welcome to AniMee, ". $email . ". You are now registered. Join Date: ".$joindate;
            echo "<a id='myBtn' href='#'>Login</a>";
        }

        mysqli_close($conn);
    ?>

</div>
<!--external JS for login popup-->
<script src="login.js"></script>


</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>