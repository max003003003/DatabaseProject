
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
		 <th>Public-UtilityID</th>
		 <th>Name</th>
		 <th>PricePerUnit</th>		
		 </tr>   
	 <form method="POST" action"{$_SERVER['PHP_SELF']}">
		<tr>
		<td><input type="text" name="upublicutility" size="8"></td>			 

		<td><input type="text" name="uname"  size="8" ></td> 

	    <td><input type="text" name="uprice" size="5"></td>  

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
		 $sql="select *from publict_utility";
		 $mydata=mysql_query($sql,$con);		 



		 echo "<table  class=\"table table-bordered\" border=1 >
	    <tr>
		 <th>Publict_utilityID</th>
		 <th>Name</th>
		 <th>PricePerUnit</th>		
		 </tr>  ";

	while ($record=mysql_fetch_array($mydata)) { 		 

		echo "<tr>";
		echo "<td>".$record['Publict_utilityID']. " </td>";
		echo "<td>".$record['Name']. " </td>";
		echo "<td>".$record['PricePerUnit']. " </td>";		
		//echo "<td>"."<input type=hidden name=hidden value=". $record['Room_Number']. " </td>"; 
		//echo "<td><input type='submit' name='edit' value='edit'></td>"; 
	  		
	}


			 

	

function process_form(){
	$puid=trim($_POST["upublicutility"]);
	$name=trim($_POST["uname"]);
	$priceperunit=trim($_POST["uprice"]); 
	$puid=addslashes($puid);
	$name=addslashes($name);
	$priceperunit=doubleval($priceperunit);  
	echo $puid."  ".$name."  ".$priceperunit;
	 
	$con=mysql_connect("localhost","root","root");
		if(!$con )
		{
			die("connot connect: ".mysql_error());
		}

	mysql_select_db("domitaryproject");    

	$sql= "INSERT INTO publict_utility VALUES ({$puid},'{$name}',{$priceperunit});";
	
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