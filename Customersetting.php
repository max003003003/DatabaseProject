
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
    <script src="jquery-1.11.2.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  
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
	                        <h1>customer 
	                       <button id="add" type="button" class="btn btn-primary" align="right">Add</button>
	                       <?php
                            session_start();
                            $_SESSION["roomNumber"]="";
                            session_destroy($_SESSION["ch"]);


	                       ?>
	                  </h1>
	                        <script>
							$(document).ready(function(){
								    $("#add").click(function(){
								    	<?php   $_SESSION["ch"]=0;  ?>
	      							  window.location = 'addcustomerform.php';

	  													  });
							});
						</script>
	                     
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

	
		if(isset($_POST["Edit"]))
			{ 				
			   $_SESSION["customerid"]=$_POST["hidden"];
			 echo " <script>
							$(document).ready(function(){
											    
				      							  window.location = 'customeredit.php';
				  													  
										});				      </script>			";
			}
			if(isset($_POST["Delete"]))
			{            
				delete_form($_POST["hidden"]);
			}

	        $con=mysql_connect("localhost","root","root");
			if(!$con )
			{
				die("connot connect: ".mysql_error());
			}

		mysql_select_db("domitaryproject");
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
			 <th> BirthDate</th>
			 <th> TEl </th>
			 <th> Option </th>
			 </tr>  ";

		while ($record=mysql_fetch_array($mydata)) { 		 

			echo "<tr>";
		echo"<form action=\"Customersetting.php\" method=\"post\">";

			echo "<td>".$record['Customer_ID']. " </td>";
			echo "<td>".$record['Fname']. " </td>";
			echo "<td>".$record['Lname']. " </td>";
			echo "<td>".$record['Sex']. " </td>";
			echo "<td>".$record['IDCard']. " </td>";
			echo "<td>".$record['Address']. " </td>";		
			echo "<td>".$record['BirthDate']. " </td>";
			echo "<td>".$record['TEL']."</td>";
			echo "<td style = \"display:none\">"."<input type=hidden name=hidden value=". $record['Customer_ID']. " </td>"; 
			echo " <td class=\"text-center\"> <input  id=\"Edit\" class=\"btn btn-warning\" type='submit' name=\"Edit\" value=\"Edit\" > ";
			echo " <input  id=\"add\" class=\"btn btn-danger\" type='submit' name=\"Delete\" value=\"Delete\" > </td>";
		   echo "</form>";
		}	

		function delete_form($customerid)
		{
			
          $con=mysql_connect("localhost","root","root");
			if(!$con )
			{
				die("connot connect: ".mysql_error());
			}

		mysql_select_db("domitaryproject");

			$sql="DELETE FROM customer WHERE Customer_ID={$customerid}";
			$result=mysql_query($sql,$con);
			if($result)
				echo "<script> alert(\" Delete \"); </script>";  

		}

	
	?>
</div>

</body>


</div>

	                
 </html>