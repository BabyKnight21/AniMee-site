<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniMee Registration</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/checkout.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--fa-fa icons-->
</head>
<script language="JavaScript" type="text/javascript">
	function checkpassword(){
		var pass1=document.getElementById('password1').value;
		var pass2=document.getElementById('password2').value;
		if (document.getElementById('password2').value!=document.getElementById('password1').value){
			alert("Entered passwords are different. Please try again");
		}
	}
	function checkmail(){
			var checkmail=document.getElementById("email").value;
			if (/^[\w-.]+@[\w]+(\.[a-zA-Z]+)+$/.test(checkmail)==false){
				alert(checkmail + " has invalid formatting.");				
				document.getElementById("email").value= null;
			};
		};
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
<div class="checkoutcontainer">
	<h1>Registration Page</h1>
	<div style="font-size:20px;">
	<form action="registration2.php" method="POST">

	<label for="email"><i class="fa fa-envelope"></i> <b>Email (required) </b></label>
	<input type="email" required id="email"  name="email" placeholder="alan@example.com" onchange=checkmail()>
	<br><br>
	<label for="password"><i class="fa fa-comments-o"></i> <b>Password (required)</b></label>
	<input type="password" id="password1" required name="password1" placeholder="********" >
	<br><br>
	<label for="password"><i class="fa fa-comments-o"></i> <b>Password (required)</b></label>
	<input type="password" id="password2" required name="password2" placeholder="********" >
	
	<br><br>
	<input type="submit" name=submit value="Submit">
	<input type="reset" name=reset value="Reset">
	</form>
	</div>
</div>



</body>
<footer>
<small><i>Copyright &copy; 2020 AniMee </i><br>
Email to: <a href="mailto:animeee@eee.com.sg">animeee@eee.com.sg</a></small>
</footer>
</html>