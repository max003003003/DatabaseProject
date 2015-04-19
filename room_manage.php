<!DOCTYPE html>
<meta charset="utf-8"/>
<body>
<?php

	$con=mysql_connect("localhost","root","root");
    if(!$con )
    {
    	die("connot connect: ".mysql_error());
    }

    mysql_select_db("domitaryproject");
   

     if (isset($_POST['add'])){
        $addQuery= "INSERT INTO  room (Room_Number,Status, Deposit ,Date_IN ,Date_Out ,User, Password ,Type ,Price)
        VALUES ('$_POST[uroom_Number]','$_POST[ustatus]','$_POST[udeposit]','$_POST[udate_IN]','$_POST[udate_Out]','$_POST[uuser]','$_POST[upassword]','$_POST[utype]','$_POST[uprice]' )";
       echo $addQuery;

        mysql_query($addQuery,$con);
     };
    

     $sql= "SELECT *FROM room ";
     $mydata=mysql_query($sql,$con);
     echo "<table border=1>
     <tr>
     <th>RoomNumber</th>
     <th>status</th>
     <th>Deposit</th>
     <th>Date_IN</th>
     <th>Date_Out</th>
     <th>User</th>
     <th>Password</th>
     <th>Type</th>
     <th>Price</th>
     </tr>"; 
  
  echo "<form action=room_manage.php method=post>";
  echo "<tr>";
  echo "<td><input type=text name=uroom_Number></td>";

  echo "<td><input type=float name=udeposit></td>"; 
  echo "<td><input type=text name=uuser</td>";
  echo "<td><input type=text name=upassword</td>";
  echo "<td><input type=text name=utype></td>";
  echo "<td><input type=text name=uprice</td>";
  echo "<td>"."<input type=submit name=add value=add" . " </td>";
  

  
  echo "</form>";  
  echo "</table>";
  mysql_close($con);
  

?>
</body>
</html>