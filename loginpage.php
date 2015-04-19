<?php
session_start();
?>
<<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <div class="container">
<body>
 <?php
 	$form="<form  class=\"form-signin\"action=' ./login.php' method='post'>
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
</div>
</html>