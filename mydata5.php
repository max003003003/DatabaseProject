<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php




	$con=mysql_connect("localhost","root","root");
    if(!$con )
    {
    	die("connot connect: ".mysql_error());
    }
   	 
     mysql_select_db("employee",$con);
     
     if (isset($_POST['update'])){
        $updateQuery="Update employee set Employee_ID='$_POST[Employee_ID]',Name='$_POST[Name]',Job='$_POST[Job]',Salary='$_POST[Salary]',Department_ID='$_POST[Department_ID]' where Employee_ID='$_POST[hidden]'";
        mysql_query($updateQuery,$con);
     };
     if (isset($_POST['delete'])){
        $deleteQuery="delete  from employee where Employee_ID='$_POST[hidden]'";
        mysql_query($deleteQuery,$con);
     };

     if (isset($_POST['add'])){
        $addQuery="insert into employee (Employee_ID,Name ,Job ,Salary,Department_ID) values ('$_POST[uemployeeID]','$_POST[uname]','$_POST[ujob]','$_POST[usalary]','$_POST[udepartmentID]')";
        mysql_query($addQuery,$con);
     };
   

     $sql="select *from employee";
     $mydata=mysql_query($sql,$con);
     echo "<table border=1>
     <tr>
     <th>Employee_ID</th>
     <th>Name</th>
     <th>Job</th>
     <th>Salary</th>
     <th>Department_ID</th>
     </tr>";

  while ($record=mysql_fetch_array($mydata)) {
    echo"<form action=mydata5.php method=post>";   
    echo "<tr>";
    echo "<td>". "<input type=int name=Employee_ID value=". $record['Employee_ID']. " </td>";
    echo "<td>"."<input type=text name=Name value=".$record['Name']. " </td>";
    echo "<td>"."<input type=text name=Job value=".$record['Job']. " </td>";
    echo "<td>". "<input type=int name=Salary value=". $record['Salary']. " </td>";
    echo "<td>"."<input type=int name=Department_ID value=".$record['Department_ID']. " </td>";
    echo "<td>". "<input type=hidden name=hidden value=". $record['Employee_ID']. " </td>";
    echo "<td>"."<input type=submit name=update value=update" . " </td>";
    echo "<td>"."<input type=submit name=delete value=delete" . " </td>";
    echo "</tr>";
    echo "</form>";
  }
  
  echo "<form action=mydata5.php method=post>";
  echo "<tr>";
  echo "<td><input type=int name=uemployeeID></td>";
  echo "<td><input type=text name=uname></td>";
  echo "<td><input type=text name=ujob></td>";
  echo "<td><input type=int name=usalary></td>";
  echo "<td><input type=int  name=udepartmentID></td>";
  echo "<td>"."<input type=submit name=add value=add" . " </td>";

  echo "</form>";
  echo "</table>";
  mysql_close($con);
   echo "<a href=page1.php>First Page</a>";
      

?>
</body>
</html>