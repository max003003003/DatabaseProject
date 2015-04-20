
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ลูกค้า</title>

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
	                    <a href="room_manage.php">ข้อมูลห้องพัก</a>
	                </li>
	                <li>
	                    <a href="Customersetting.php">ลูกค้า</a>
	                </li>
	                <li>
	                    <a href="#">บิล</a>
	                </li>
	                <li>
	                    <a href="PUsetting.php">สาธารณูปโภค</a>
	                </li>
	                <li>
	                    <a href="#">ลูกจ้าง</a>
	                </li>
	                 <li>
	                    <a href="#">ซ่อม</a>
	                </li>
	                 <li>
	                    <a href="#">ตั้งค่า</a>
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
	                        <h1>ลูกค้า</h1>
	                       
	                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- /#page-content-wrapper -->

	    </div>
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

 </body>
     

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
			 $sql="select *from customer";
			 $mydata=mysql_query($sql,$con);	 



			 echo " <div class=\"span9\"> <table  class=\"table table-bordered\" border=1 >
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
  
 </html>