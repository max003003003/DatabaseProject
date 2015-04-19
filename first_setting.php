<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	
	$con=mysql_connect("localhost","root","root");
    if(!$con )
    {
    	die("connot connect: ".mysql_error());
    }
    mysql_select_db("domitaryproject");
    $sql="show tables from domitaryproject";
    $data=mysql_query($sql,$con);
    while ($record=mysql_fetch_array($mydata)) {
          echo $record;

       }
    


?>
</body>
</html>