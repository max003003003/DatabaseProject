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
  echo "<h>This page for admin </h>";
 if(isset($_SESSION['valid_user']))
 {
 	echo "you have been logged in as <b> $dbuser</b> . <a href='adminmember.php'>Click</a> Click here to go to the member page.";

 }
 else
 {

 	
 	$form= "<form action=' ./login.php' method='post'>
 	<table>
 	<tr>
 		<td>Username:</td>
 		<td><input type='text' name='user' /></td>
 	</tr>
 	<tr>
 		<td>Password:</td>
 		<td><input type='password' name='password' /></td>
    </tr>
    <tr>
    	<td></td>
    	<td><input type='submit' name='loginbtn' value='Login' /></td
    </tr>
    </table>
    </form>";
    if($_POST['loginbtn'])
    {
         $user=$_POST['user'];
         $password=$_POST['password'];


             if($user)
             {

	             	if($password)
	             	{

 
	             		require("connect.php");


	             		$query=mysql_query("select *from users where User='$user'");
	             		$password=md5($password);


	             	    

	             	
	             		$numrows=mysql_num_rows($query);


	             		if($numrows ==1)
	             		{

	             			$row =mysql_fetch_assoc($query);
	             		
	             			$dbuser=$row['User'];
	             			$dbpass=$row['Password'];



	             			
	             			if($password==$dbpass)
	             			{
	             					$_SESSION["valid_user"]=$dbuser;


	             					echo "you have been logged in as <b> $dbuser</b> . <a href='adminmember.php'>Click</a> Click here to go to the member page.";

	             			}else
	             				echo "You did not enter correct password.  $form";

                         mysql_close();

	             		}
	             		else
	             		  echo "The username you entered was not found.  $form";

	             		

	             	}
	             	else
	             	{
	             		echo "You must enter your password.  $form";
	             	}

             }
             else             
             	echo "You must enter your username. $form";
             
    }
    else
    	echo $form;
    
    
   
}

 ?>

</body>
</html>