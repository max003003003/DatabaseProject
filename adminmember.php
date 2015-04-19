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
 		
 		
 		echo "Welcome <b> $username</b>, <a href=' ./logout.php'>Logout</a>";
 		echo "<a href=room_manage.php>room_manage</a>";
 	}
 	


 ?>

</body>
</html>