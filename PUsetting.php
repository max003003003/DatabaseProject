<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>สาธารณูปโภค</title>

    <!-- Bootstrap -->
    <link href="Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sidebar.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  <script src="Bootstrap/dist/js/bootstrap.min.js"></script>
  </head>

 <nav  class="navbar navbar-static-top"align="center" >
  <div class="container" > 
    <a href="#menu-toggle"  id="menu-toggle" class="btn btn-default"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
     
  </div>
  </nav>
  <div class="container">
   <body>

	    <div id="wrapper">

	        <!-- Sidebar -->
	        <div id="sidebar-wrapper">
	            <ul class="sidebar-nav">
	                <li class="sidebar-brand">
	                    <a href="adminmember.php ">
	                        Home
	                    </a>
	                </li>               
	                <li>
	                    <a href="roomdata.php">ข้อมูลห้องพัก</a>
	                </li>
	                <li>
	                    <a href="Customersetting.php">ลูกค้า</a>
	                </li>
	                <li>
	                    <a href="bill.php">บิล</a>
	                </li>
	                <li>
	                    <a href="PUsetting.php">สาธารณูปโภค</a>
	                </li>
	                <li>
	                    <a href="employee.php">ลูกจ้าง</a>
	                </li>
	                 <li>
	                    <a href="fix.php">ซ่อม</a>
	                </li>
	                 <li>
	                    <a href="setting.php">ตั้งค่า</a>
	                </li>
	                <li>
	                    <a href="logout.php">Logout</a>
	                </li>
	               
	            </ul>
	        </div>
	        <!-- /#sidebar-wrapper -->

	        <!-- Page Content -->
	        <div id="page-content-wrapper">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <h1>สาธารณูปโภค</h1>
	                       
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- /#page-content-wrapper -->

	   
	    <!-- /#wrapper -->

	    <!-- jQuery -->
	    <script src="js/jquery.js"></script>

	    <!-- Bootstrap Core JavaScript -->
	    <script src="js/bootstrap.min.js"></script>

	    <!-- Menu Toggle Script -->
	    <script>
	    $("#menu-toggle").click(function(e) {
	        e.preventDefault();
	        $("#wrapper").toggleClass("toggled");
	    });
	    </script>

<?php




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



		 echo "<table  class=\"table table-bordered\" border=1 style=\"width:50%\" align=\"center\">
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
 </body>



   

</html>