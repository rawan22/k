<html>
<head>
</head>
<body>
<form action="insert.php" method="post">
<table>
<tr><td>Student Name: <td><input type="text" name="sn"/></tr>
<tr><td>Phone:<td><input type="text" name="phone"/><tr>
<tr><td>City:<td><input type="text" name="city"/></tr>
</table>
<input type="submit" value="send" name="ins"/>
</form>

<?php
 $conn = mysql_connect("localhost", "root", '');
 mysql_select_db("203",$conn);
  if (isset($_POST['ins'])){
if(($_POST['sn']=="")||($_POST['phone']=="")||($_POST['city']=="")) {
	echo("Blank Filed Found, Add All Students Info. ");
}else{
  $sql = "INSERT INTO stu values ('', '$_POST[sn]','$_POST[phone]','$_POST[city]')";
 mysql_query($sql, $conn);
     echo "Student record added to the database!";
echo "<meta http-equiv='refresh' content='1'>";
 }
 }else{
	 echo "Please Add New Student!"; 
 }
 ?>

</body>
</html>