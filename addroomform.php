<!DOCTYPE html>
<?php

  session_start()
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>เพิ่มข้อมูลห้อง</title>

    <!-- Bootstrap -->
    <link href="Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sidebar.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="jquery-1.11.2.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  
  <script src="Bootstrap/dist/js/bootstrap.min.js"></script>
 </head><div class="container">
 <nav  class="navbar navbar-static-top"align="center" >
  <div class="container" > 
    <a href="#menu-toggle"  id="menu-toggle" class="btn btn-default"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
     
  </div>
  </nav>

  
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
	                       
	                  <h1>add room 
	                       <button id="add" type="button" class="btn btn-primary" align="right">back</button>
	                       </h1>
	                        <script>
							$(document).ready(function(){
								    $("#add").click(function(){
	      							  window.location = 'room_manage.php';
	  													  });
							});
						</script>
	                 

	                   
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
	    <br>


   <div>
       <form action=room_manage.php method=post>
       <h align="center">add new room</h>
		<table align="center">
		 <form action="addroomforom.php" method="post">  
  <tr>
             <td>RoomNumber:</td><td><input type="text" name="uroom_Number"  ></td>
   </tr>
    <tr>
          <td>Status:</td><td><input type="radio" name="ustatus" value="ready" checked>ready
        <input type="radio" name="status" value="stay">stay
    </tr>
    <tr>
             <td>Deposit:</td><td><input type="text" name="udeposit"></td>
    </tr>
    <tr>
               <td>Type:</td><td><input type="radio" name="utype" value="daily"  checked>daily
        <input type="radio" name="status" value="monthly">monthly
    </td>
    </tr>
    <tr>
            <td>Price:</td><td><input type="text" name="uprice"></td>
     </tr>
     <tr>
        <td></td><td><input type="submit" name="send" value="add"></td>
    </tr>
    </tr>
    </form>

	</div>
	
		
   





 </body>
<?php
    session_start();
 
	


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
	echo $roomNumber.$status;
	 
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
	if($result&&$result2)
		echo "<script> alert(\" Your data have been add\"); </script>";  
	else  
		echo "<script> alert(\" Error \"); </script>";  		
	mysql_close($con);
}


?>

 </div>
	                </div>
	            </div>
	        </div>

   </div>

</html>