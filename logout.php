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
 	if (isset($_SESSION["valid_user"]))
 	{
 		   session_destroy();
           echo "You have been logged out . <a href='./index.php'>Login</a>";
 	}
 	else{
 		echo "You are not logged in. ";
 		echo "Please login to access <a href=' ./index.php'>Login</a>";
 		exit;
 	}
 	


 ?>

</body>
</html>