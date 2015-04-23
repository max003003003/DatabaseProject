
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
   
     <?php

             $con=mysql_connect("localhost","root","root");
			if(!$con )
			{
				die("connot connect: ".mysql_error());
			}

		mysql_select_db("domitaryproject");
	         mysql_query("SET NAMES UTF8");
			 $sql="select *from customer where Customer_ID={$_SESSION["customerid"]};";
			 $mydata=mysql_query($sql,$con);	       
   		     $record=mysql_fetch_array($mydata);
   		    $cusid=$record['Customer_ID'];
			$fname=$record['Fname'];
			$lname=$record['Lname'];
			$sex=$record['Sex'];
			$idcard=$record['IDCard'];
			$addres=$record['Address'];		
			$birthdate=explode("-", $record['BirthDate']);
            $date=$birthdate[2];
            $month=$birthdate[1];
            $year=$birthdate[0];
           


			$tel=$record['TEL'];
			
            
            $sql2=" SELECT Room_Number, Deposit
					FROM room, room_log r
					WHERE r.customer_Customer_ID ={$cusid} && r.roomNumber = room.Room_Number";
           $mydata2=mysql_query($sql2,$con);
           $record2=mysql_fetch_array($mydata2); 
   		     $roomnumber=$record2['Room_Number'];
   		     $deposit=$record2['Deposit'];
   		    
				
    
     ?>

   <tr>
             <td>RoomNumber:</td><td><input type="text" name="uroomNumber" value=<?php echo $roomnumber; ?> ></td>
   </tr>
   <tr>
             <td>Deposit</td><td><input type="text" name="udeposit" value=<?php echo $deposit; ?>></td>
   </tr>
   <tr>
             <td>CustomerID:</td><td><input type="text" name="ucustomerid" value=<?php echo $cusid; ?>></td>
   </tr>
    <tr>
             <td>FirstName:</td><td><input type="text" name="ufirstname" value=<?php echo $fname; ?>></td>
   </tr>
    <tr>
             <td>Lastname:</td><td><input type="text" name="ulastname" value=<?php echo $lname; ?>></td>
   </tr>
    <tr>
          <?php
          if(!strcmp($sex,"male")){
          echo"<td>Sex:</td><td><input type=\"radio\" name=\"usex\" value=\"male\" checked>male";
          echo"<input type=\"radio\" name=\"usex\" value=\"female\"  >female";
        }
        else 
         {  
         	  echo"<td>Sex:</td><td><input type=\"radio\" name=\"usex\" value=\"male\">male";
              echo"<input type=\"radio\" name=\"usex\" value=\"female\" checked >female";

          }
        ?>
    </tr>
    <tr>
             <td>IDcard:</td><td><input type="text" name="uidcard" value=<?php echo $idcard; ?>></td>
    </tr>
     <tr>
             <td>Address:</td><td><input type="text" name="uaddress"      value=<?php echo $addres; ?>></td>
    </tr>
    <tr> 
           <td>Tel.</td><td><input type="text" name="utel" value=<?php echo $tel; ?>></td>
    </tr>
<tr><td>
<select name=month >Select Month</option>
<?php
$monthr = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
for($i=1;$i<=12;$i++)
{
if($i==intval($month))
   echo"<option value='{$i}' selected >{$monthr[$i-1]}</option>";
else
   echo"<option value='{$i}' > {$monthr[$i-1]} </option>";
}
?>
</select>
</td>
<td>
Date<select name=dt value=<?php echo $month; ?> >
<?php
    for($i=1;$i<=31;$i++)
    { 
    	if($i==intval($date))
    	{
           echo "<option value='{$i}' selected>{$i}</option>";
    	}
    	else
    	{
          echo "<option value='{$i}'>{$i}</option> ";
    	}


    }


?>

</select>

Year(yyyy)<input type=text name=year size=4 value=<?php echo $year; ?> >
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
   	mysql_query("UPDATE room SET Status=\"stay\" , Deposit=$deposit WHERE 	Room_Number={$roomNumber};",$con);
   		
   	$result=mysql_query($sql,$con);	
	if($result)
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