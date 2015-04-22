<!DOCTYPE html>

  


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
	                       
	                  <h1>roomdata</h1>              
	                       
	                        
	                 

	                   
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

 



 </body>
<?php
  session_start();
	if(isset($_POST["Add"]))
{ 
	
   $_SESSION["roomNumber"]=$_POST["hidden"];

 echo " <script>
				$(document).ready(function(){
								    
	      							  window.location = 'addcustomerform.php';
	  													  
							});
	      </script>
";
}
if(isset($_POST["Checkout"]))
{

$con=mysql_connect("localhost","root","root");
		if(!$con )
		{
			die("connot connect: ".mysql_error());
		}
		 
		 mysql_select_db("domitaryproject",$con);

		 $sql="select *from room";
		 $roomNumber=$_POST["hidden"];
		 $now =time();         
         $sql="UPDATE room_log SET Date_out=CURRENT_TIMESTAMP() WHERE roomNumber=$roomNumber ; ";         
         $sql2="UPDATE room SET Status=\"ready\",Deposit=0 WHERE Room_Number={$roomNumber};";         
         $sql3="SELECT Deposit from room WHERE Room_Number={$roomNumber};";
         $deposit=mysql_fetch_array(mysql_query($sql3));
         $deposit=$deposit["Deposit"];
         $result=mysql_query($sql,$con); 
         $result2=mysql_query($sql2,$con);
       
        if($result&&$result2)
		echo "<script> alert(\" Your have been checked out plese return deposit " .$deposit." \"); </script>";  
	   else  
		echo "<script> alert(\" Error \"); </script>";  		
	   mysql_close($con);         
}


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
		 <th class=\"text-center\">RoomNumber</th>
		 <th class=\"text-center\">Status</th>
		 <th class=\"text-center\">Deposit</th>
		 <th class=\"text-center\">Type</th>
		 <th class=\"text-center\">Price</th>
    <th class=\"text-center\">Option</th>
		 </tr> ";
 

  
	while ($record=mysql_fetch_array($mydata)) { 

		echo "<tr>";	
		echo"<form action=roomdata.php method=post>";	
		echo "<td class=\"text-center\">".$record['Room_Number']. " </td>";
		echo "<td class=\"text-center\">".$record['Status']. " </td>";
		echo "<td class=\"text-center\">".$record['Deposit']. " </td>";
		echo "<td class=\"text-center\">".$record['Type']. " </td>";
		echo "<td class=\"text-center\">".$record['Price']. " </td>";   
		echo "<td style = \"display:none\">"."<input type=hidden name=hidden value=". $record['Room_Number']. " </td>"; 
        if( strcmp($record['Status'],"ready")==0){
         	echo " <td class=\"text-center\"><input  id=\"add\" class=\"btn btn-success\" type='submit' name=\"Add\" value=\"Add\" > ";
         	echo "</form>";

        }
        else{
		  echo "<td class=\"text-center\"> <input class=\"btn btn-danger\" type='submit' name=\"Checkout\" value=\"Checkout\" > "; 
		  echo "</form>";
        }  		
	}


?>

 </div>
	                </div>
	            </div>
	        </div>

   </div>

</html>