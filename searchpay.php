
 
 
 <?php
 
 $conn = mysql_connect("localhost", "root", '');

  mysql_select_db("203",$conn);
  $id=$_GET['id1'];

$sql = "select stu.id,stu.sname,payments.pay,payments.date from stu join payments on(stu.id=payments.id)
where stu.id='$id' ";

$result = mysql_query($sql, $conn) ;

//  number of rows fetched
$num = mysql_num_rows($result);

echo("<table width=600 border=1 >");

echo("<th>Student ID<th>Student Name<th>Payment<th>Payment Date");

while ($arr = mysql_fetch_array($result)) {
  
echo("<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td></tr>");

 }

echo("</table>");
echo($num." Payments Found");
echo("<br>");
echo("<a href=form2.html>Add New Payment</a>");


 ?>
 
 </html>
 

