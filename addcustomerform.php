
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>เพิ่มลูกค้า</title>

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
	                       
	                  <h1>add new customer 
	                       <button id="add" type="button" class="btn btn-primary" align="right">back</button>
	                  </h1>
	                        <script>
							$(document).ready(function(){
								    $("#add").click(function(){
	      							  window.location =<?php session_start(); 	      							  
	      							                          if($_SESSION["ch"]){
	      							                            echo "'roomdata.php';";}
	      							                          else{
	      							                          	echo "'Customersetting.php';"; 
	      							                            
	      							                            }
	      							                          ?>
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
  
      
       <h align="center"></h>
		<table align="center">
		 <form action="addcustomerform.php " method="post">  

   <tr>
    <td>RoomNumber:</td><td><input type=\"text\" name=\"uroomNumber\" value=<?php echo $_SESSION["roomNumber"]; ?> ></td>
   </tr>
   <tr>
       <?php    if($_SESSION["ch"])
                   echo "<td>Deposit</td><td><input type=\"text\" name=\"udeposit\" value=\"0\"></td>";
      ?>
   </tr>


   <tr>
             <td>CustomerID:</td><td><input type="text" name="ucustomerid"></td>
   </tr>
    <tr>
             <td>FirstName:</td><td><input type="text" name="ufirstname"></td>
   </tr>
    <tr>
             <td>Lastname:</td><td><input type="text" name="ulastname"></td>
   </tr>
    <tr>
          <td>Sex:</td><td><input type="radio" name="usex" value="male" checked>male
        <input type="radio" name="usex" value="female">female
    </tr>
    <tr>
             <td>IDcard:</td><td><input type="text" name="uidcard"></td>
    </tr>
     <tr>
             <td>Address:</td><td><input type="text" name="uaddres"></td>
    </tr>
    <tr> 
           <td>Tel.</td><td><input type="text" name="utel"></td>
    </tr>
<tr><td>
<select name=month value=''>Select Month</option>
<option value='01'>January</option>
<option value='02'>February</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select>
</td>
<td>
Date<select name=dt >
<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select>

Year(yyyy)<input type=text name=year size=4 >
</td>
 </tr>   
     <td><input type="submit" name="send" value="add"></td>
   
    </tr>

 </table>
 </td>
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
		

function process_form(){
	$customerid=trim($_POST["ucustomerid"]);
	$fname=trim($_POST["ufirstname"]);
	$lname=trim($_POST["ulastname"]);
	$sex=trim($_POST["usex"]);
	$idcard=trim($_POST["uidcard"]);
	$address=trim($_POST["uaddres"]);
	$birthdate=trim($_POST["year"]."-".$_POST["month"]."-".$_POST["dt"]);	
	$deposit=trim($_POST["udeposit"]);
	$roomNumber=trim($_POST["uroomNumber"]);	 
	$tel=trim($_POST["utel"]);
	$con=mysql_connect("localhost","root","root");
		if(!$con )
		{
			die("connot connect: ".mysql_error());
		}

	mysql_select_db("domitaryproject");   

    $getcus=mysql_query("SELECT IDCard FROM customer WHERE IDCard = \"$idcard\" ;",$con);
    $rr=mysql_num_rows($getcus);
   
   if($rr)//oldmember
   {
   	$getcus=mysql_query("SELECT Customer_ID FROM customer WHERE IDCard = \"$idcard\" ;",$con);
   	$cusid= mysql_fetch_array($getcus);
   	$cusid=$cusid["Customer_ID"];
   	$last="SELECT id FROM room_log ORDER BY id DESC LIMIT 1"; 
    $re=mysql_query($last);
    $rec= mysql_fetch_array($re);
    $id=$rec["id"]+1 ;
   	$sql="INSERT INTO room_log( id,RoomNumber, customer_Customer_ID ) VALUES ({$id},{$roomNumber},{$cusid});";
  
   		
   	$result=mysql_query($sql,$con);	
	if($result)
		echo "<script> alert(\" Your data have been add\"); </script>";  
	else  
		echo "<script> alert(\" Error".mysql_error()." \"); </script>"; 
	mysql_close($con);           
   }
   else{   	  //new member
    $last="SELECT id FROM room_log ORDER BY id DESC LIMIT 1";    
    $las2t="SELECT Customer_ID FROM customer ORDER BY Customer_ID DESC LIMIT 1";
    $re2=mysql_query($las2t);
    $rec2= mysql_fetch_array($re2);
    $rec2=$rec2["Customer_ID"]+1 ;   
    $re=mysql_query($last);
    $rec= mysql_fetch_array($re);
    $id=$rec["id"]+1 ;
	$sql= "INSERT INTO customer VALUES ({$customerid},'{$fname}','{$lname}','{$sex}','{$idcard}','{$address}','{$birthdate}','$tel');";
	$sql2="INSERT INTO room_log( id, RoomNumber, customer_Customer_ID ) VALUES ({$id},{$roomNumber},{$customerid});";
	$result=mysql_query($sql,$con);
	$result2=mysql_query($sql2,$con);	
	
   	if($result2&&$result)
		echo "<script> alert(\" Your data have been add\"); </script>";  
	else  
		echo "<script> alert(\" Error".mysql_error()." \"); </script>";  		
	mysql_close($con);

   }





}


?>

 </div>
	                </div>
	            </div>
	        </div>

   </div>

</html>