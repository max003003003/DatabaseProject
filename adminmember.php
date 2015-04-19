<?php
 error_reporting(E_ALL ^ E_NOTICE);
 session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <?php
 	if(!isset($_SESSION["valid_user"])){
 		echo "Please login to access <a href=' ./index.php'>Login</a>";

 	}
 	else{
 		
 		
 		echo "Welcome <b> $username</b>, <a href=' ./logout.php'>Logout</a>\n<br>";
 		echo "<a href=room_manage.php>room_manage</a>\n<br>";
 		echo "<a href=PUsetting.php>PUsetting</a>\n<br>";
 		echo "<a href=Customersetting.php>Customersetting</a>\n<br>";
 	}
 	


 ?>

</body>
</html>