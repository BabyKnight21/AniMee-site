<!DOCTYPE html>
<html lang="en">
<head></head>
<?php 
    $recipient_name='a';
    $recipient_email='b';
    $recipient_address='c';

    include "dbconnect.php";  
    $neworder=7;

    //update orderdetails table (recipient info)
    $updateorder = "INSERT INTO orderdetails(`orderid`,`email`,`name`,`address`)
    VALUES ('$neworder','$recipient_email','$recipient_name','$recipient_address')";
    $result=mysqli_query($conn,$updateorder);

    mysqli_close($conn);
?>
<body>
<form action='test.php'>
<input type="submit" name="submit" value="update" />	
		</form>
</body>
</html