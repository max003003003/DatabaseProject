
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
		 <th>Customer_ID</th>
		 <th>Fname</th>
		 <th>Lname</th>	
		 <th>Sex</th>	
		 <th> IDCard</th>
		 <th> Address </th>
		 <th> Room_Number</th>
		 <th> BirthDate</th>
		 </tr>   
	 <form method="POST" action"{$_SERVER['PHP_SELF']}">
		<tr>
		<td><input type="text" name="ucusid" ></td>			 

		<td><input type="text" name="ufname"   ></td> 

	    <td><input type="text" name="ulname" ></td>  
	    <td><input type="text" name="usex" ></td> 

	    <td><input type="text" name="uidcard"   ></td> 

	    <td><input type="text" name="uaddress" ></td>  

        <td><input type="text" name="uroomnumber"  ></td> 

	    <td><input type="text" name="ubirth" ></td> 

	 <td><input type="submit" class="btn btn-primary btn-lg active" name="send" value="add" ></td>
	 </tr>
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
         mysql_query("SET NAMES UTF8");
		 $sql="select *from customer";
		 $mydata=mysql_query($sql,$con);	 



		 echo "<table  class=\"table table-bordered\" border=1 >
	   <tr>
		 <th>Customer_ID</th>
		 <th>Fname</th>
		 <th>Lname</th>	
		 <th>Sex</th>	
		 <th> IDCard</th>
		 <th> Address </th>
		 <th> Room_Number</th>
		 <th> BirthDate</th>
		 </tr>  ";

	while ($record=mysql_fetch_array($mydata)) { 		 

		echo "<tr>";
		echo "<td>".$record['Customer_ID']. " </td>";
		echo "<td>".$record['Fname']. " </td>";
		echo "<td>".$record['Lname']. " </td>";
		echo "<td>".$record['Sex']. " </td>";
		echo "<td>".$record['IDCard']. " </td>";
		echo "<td>".$record['Address']. " </td>";
		echo "<td>".$record['Room_Number']. " </td>";
		echo "<td>".$record['BirthDate']. " </td>";

		//echo "<td>"."<input type=hidden name=hidden value=". $record['Room_Number']. " </td>"; 
		//echo "<td><input type='submit' name='edit' value='edit'></td>"; 
	  		
	}


			 

	

function process_form(){
	$cusid=trim($_POST["ucusid"]);
	$fname=trim($_POST["ufname"]);
	$lname=trim($_POST["ulname"]); 
	$sex=trim($_POST["usex"]);
	$idcard=trim($_POST["uidcard"]);
	$address=trim($_POST["uaddress"]); 
	$roomnumber=trim($_POST["uroomnumber"]);
	$birth=trim($_POST["ubirth"]);
	$cusid=addslashes($cusid);
	$fname=addslashes($fname);
	$lname=addslashes($lnam); 
	$sex=addslashes($sex);
	$idcard=addslashes($idcard);
	$adddress=addslashes($addslashes);
	$roomnumber=addslashes($roomnumber);
	$birth=addslashes($birth);
	
	 
	$con=mysql_connect("localhost","root","root");
		if(!$con )
		{
			die("connot connect: ".mysql_error());
		}

	mysql_select_db("domitaryproject");    

	$sql= "INSERT INTO customer VALUES ({$cusid},'{$fname}','{$lname}','{$sex}',{$idcard},'{$address}',{$roomnumber},'{$birth}');";
	echo $sql;
	
	$result=mysql_query($sql,$con);

	if($result)
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