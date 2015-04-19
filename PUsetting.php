
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
  <script src="Bootstrap/dist/js/bootstrap.min.js"></script>
  <div class="container">
  	<div class="row">
  	
  	  <div class=".col-lg-6">
<?php


echo <<<HIPPOTOPAMUS

<table   class="table table-bordered" border=1>
		 <tr>
		 <th>RoomNumber</th>
		 <th>Status</th>
		 <th>Deposit</th>
		 <th>Type</th>
		 <th>Price</th>
		 </tr>   
	 <form method="POST" action"{$_SERVER['PHP_SELF']}">
		<tr>
		<td><input type="text" name="uroom_Number" size="8"></td>
		
		<td>
				 <input type="radio" name="ustatus" value="ready" checked>ready     
				 <br>   
				 <input type="radio" name="ustatus" value="stay" >stay    
		</td>   

		<td><input type="text" name="udeposit" value="0" size="5" ></td>
	 
		<td>
				<input type="radio" name="utype" value="daily" checked>daily
				<br>
				<input type="radio" name="utype" value="monthly" >monthly
		</td>

	 <td><input type="text" name="uprice" size="5"></td>  
	 <td><input type="submit" class="btn btn-primary btn-lg active" name="send" value="add" ></td>
</form>
HIPPOTOPAMUS;

echo " <a href='adminmember.php'>admin menu</a>";


	if(isset($_POST["send"]))
			 process_form(); 

$con=mysql_connect("localhost","root","root");
		if(!$con )
		{
			die("connot connect: ".mysql_error());
		}
		 
		 mysql_select_db("domitaryproject",$con);

		 $sql="select *from room";
		 $mydata=mysql_query($sql,$con); 

		 



		 echo "<table  class=\"table table-bordered\" border=1 >
		 <tr>
		 <th>RoomNumber</th>
		 <th>Status</th>
		 <th>Deposit</th>
		 <th>Type</th>
		 <th>Price</th>
		 </tr> ";

	while ($record=mysql_fetch_array($mydata)) { 
		 

		echo "<tr>";
		echo "<td>". $record['Room_Number']. " </td>";
		echo "<td>".$record['Status']. " </td>";
		echo "<td>".$record['Deposit']. " </td>";
		echo "<td>". $record['Type']. " </td>";
		echo "<td>".$record['Price']. " </td>";   
		//echo "<td>"."<input type=hidden name=hidden value=". $record['Room_Number']. " </td>"; 
		//echo "<td><input type='submit' name='edit' value='edit'></td>"; 
	  		
	}


			 

	

function process_form(){
	$roomNumber=trim($_POST["uroom_Number"]);
	$status=trim($_POST["ustatus"]);
	$deposit=trim($_POST["udeposit"]); 
	$user=$roomNumber;
	$password=$roomNumber;
	$type=trim($_POST["utype"]);
	$price=trim($_POST["uprice"]);
	$roomNumber=addslashes($roomNumber);
	$status=addslashes($status);
	$deposit=doubleval($deposit);
	$user=addslashes($user);
	$password=addslashes($password);
	$type=addslashes($type);
	$price=doubleval($price);  
	 
	$con=mysql_connect("localhost","root","root");
		if(!$con )
		{
			die("connot connect: ".mysql_error());
		}

	mysql_select_db("domitaryproject");    

	$sql= "INSERT INTO room VALUES ({$roomNumber},'{$status}',{$deposit},'{$type}',{$price});";
	$sql2="INSERT INTO  users VALUES ('{$user}',md5('{$password}'),0)";
	$result=mysql_query($sql,$con);
	$result2=mysql_query($sql2,$con);
	echo "$result";
	echo "<h3>result </h3>\n";
	if($result&&$result2)
		echo "<script> alert(\" have been add\"); </script>";  
	else  
		echo" Error";
		
	mysql_close($con);
}


?>



   </div>
 </div>
</div>
</html>