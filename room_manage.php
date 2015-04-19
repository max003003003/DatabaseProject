<!DOCTYPE html>
 <table border=1>

     <tr>
     <th>RoomNumber</th>
     <th>status</th> 
     <th>Deposit</th>   
    
     <th>Type</th>
     <th>Price</th>
     </tr>
   <form method="POST" action"{$_SERVER['PHP_SELF']}">
    <tr>
    <td><input type="text" name="uroom_Number"></td>
    
    <td><input type="radio" name="ustatus" value="ready" checked>ready        
         <input type="radio" name="ustatus" value="stay" >stay
    </td>   

    <td><input type="text" name="udeposit" value="0"></td>
    <td><input type="radio" name="utype" value="daily" checked>daily
        <input type="radio" name="utype" value="monthly" >monthly

    </td>
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
   
  $con=mysql_connect("localhost","root","root");
    if(!$con )
    {
      die("connot connect: ".mysql_error());
    }

  mysql_select_db("domitaryproject");  
  
  echo md5("2560");
  $sql= "INSERT INTO room VALUES ({$roomNumber},'{$status}',{$deposit},'{$type}',{$price});";
  $sql2="INSERT INTO  users VALUES ('{$user}',md5('{$password}'),0)";
  
  $result=mysql_query($sql,$con);
  $result2=mysql_query($sql2,$con);
  echo "$result";
  echo "<h3>result </h3>\n";
  if($result&&$result2)
    echo "have been add".mysql_affected_rows($con);  
  else  
    echo" Error";
    
  mysql_close($con);
}


?>
<body>

</body>
</html>