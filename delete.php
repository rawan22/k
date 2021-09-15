<?php

$conn = mysql_connect("localhost", "root", '');
mysql_select_db("203",$conn);
$sql="SELECT * FROM stu order by ID ";
$result=mysql_query($sql,$conn);
$count=mysql_num_rows($result);
?>

<td><form name="form1" method="POST" action="delete.php"> 
<table  width=50% border="1"  >
<tr><td>select</td><td >ID</td><td>Name</td><td >Phone</td><td >City</td></tr>

<?php
while($rows=mysql_fetch_array($result)){
?>
<tr>
<td ><input name="checkbox[]" type="checkbox"  value="<?php echo $rows[0]; ?>"></td>
<td><?php echo $rows[0]; ?></td>
<td><?php echo $rows[1]; ?></td>
<td><?php echo $rows[2]; ?></td>
<td><?php echo $rows[3]; ?></td>

<?php
}
?>
<tr>
<td colspan="5" align="center" ><input name="delete"
 type="submit"  value="Delete"></td>
</tr>
<?php

if (isset($_POST['delete'])){ 
	
    $checkbox=$_POST['checkbox'];
	for($i=0;$i<count($checkbox);$i++){
		$del_id = $checkbox[$i];
		$sql = "DELETE FROM stu WHERE id='$del_id'";
		$result = mysql_query($sql);
	}
	
if($result){


echo "<meta http-equiv='refresh' content='0'>";
}
}
mysql_close();

?>
</table>
</form>

