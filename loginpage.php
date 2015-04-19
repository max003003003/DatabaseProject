<?php
session_start();
?>
<<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <?php
 	$form="<form action=' ./login.php' method='post'>
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
    if($_POST['Login'])
    {
             $user=$_POST['user'];
             $password=$_POST['password'];
             if($user)
             {
             	if($password)
             	{
             		echo "$user - $password";

             	}
             	else
             	{
             		echo "You must enter your password.  $form";
             	}

             }
             else
             {
             	echo "You must enter your username";

             }
    }
   


 ?>

</body>
</html>