<!DOCTYPE html>
 <table border=1>
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
     </tr>
   <form method="POST" action"{$_SERVER['PHP_SELF']}">
    <tr>
    <td><input type="text" name="uroom_Number"></td>
    <td><input type="text" name="ustatus"></td>
    <td><input type="text" name="udeposit"></td> 
   <td><input type="text" name="udatein"></td> 
   <td><input type="text" name="udateout"></td> 
  <td><input type="text" name="uuser"></td>
  <td><input type="text" name="upassword"></td>
  <td><input type="text" name="utype"></td>
  <td><input type="text" name="uprice"></td>
<td><input type="submit" name="send" value="add"></td>
</form>
<meta charset="utf-8"/>
<?php
  if(isset($_POST["send"]))
       process_form(); 
  else
    show_form();

function show_form(){ 
 
}

function process_form(){
  $roomNumber=trim($_POST["uroom_Number"]);
  $status=trim($_POST["ustatus"]);
  $deposit=trim($_POST["udeposit"]);
  $datein=trim($_POST["udatein"]);
  $dateout=trim($_POST["udateout"]);
  $user=trim($_POST["uuser"]);
  $password=trim($_POST["upassword"]);
  $type=trim($_POST["utype"]);
  $price=trim($_POST["uprice"]);
  $roomNumber=addslashes($roomNumber);
  $status=addslashes($status);
  $deposit=doubleval($deposit);
  $user=addslashes($user);
  $password=addslashes($password);
  $type=addslashes($type);
  $price=doubleval($price);  
   
  $con=mysql_connect("localhost","root","root");
    if(!$con )
    {
      die("connot connect: ".mysql_error());
    }

  mysql_select_db("domitaryproject");  
  
  $sql= "INSERT INTO room VALUES ('{$roomNumber}','{$status}',{$deposit},'{$datein}','{$dateout}','{$user}','{$password}','{$type}',{$price});";
  
  $result=mysql_query($sql,$con);
  echo "$result";
  echo "<h3>result </h3>\n";
  if($result)
    echo "have been add".mysql_affected_rows($con);  
  else  
    echo" Error";
    
  mysql_close($con);
}


?>
<body>

</body>
</html>