<?php
 error_reporting(E_ALL ^ E_NOTICE);
 session_start();

?>

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

 <?php
  
 if(isset($_SESSION['valid_user']))
 {
 	echo "Welcome you have been logged in as <b> $dbuser</b> . <a href='adminmember.php'>Click</a> Click here to go to the member page.";

 }
 else
 {

 	
 	$form= "<form class=\"form-signin\"action=' ./login.php' method='post'>
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
	             			$type=$row['Type'];
	             			




	             			
	             			if($password==$dbpass)
	             			{

	             				if( $type==1){
	             					$_SESSION["valid_user"]=$dbuser;                                    	
	             					echo "you have been logged in as <b> $dbuser  
	             					</b> . <a href='adminmember.php'>Click</a> Click here to go to the member page.";
	             				}else
	             				 echo "you have been logged in as <b> $dbuser  
	             					</b> . <a href='user.php'>Click</a> Click here to go to the member page.";

	             					
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

</div>
</body>

</html>