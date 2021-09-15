<html>
<head>
<style>
.tbl{
	
	background-color:lightgreen;
	width:70%;
	font-family:arial;
	font-size:14pt;
	
}





</style>
</head>

<body>


 <?php

 $conn = mysql_connect("localhost", "root", '');

  mysql_select_db("203",$conn);


$sql = "select stu.id,stu.sname,sum(payments.pay),count(payments.id) from stu join payments
on(stu.id=payments.id) group by stu.id,stu.sname";

$sql1="select sum(pay),count(*) from payments";

 $result = mysql_query($sql, $conn) ;
 $result1 = mysql_query($sql1, $conn) ;

//  number of rows fetched
$num = mysql_num_rows($result);

$arr1 = mysql_fetch_array($result1);


echo("<table class='tbl' width=600 border=1>");

echo("<th>Student ID<th>Student Name<th>Total Payments<th>Payment Count");


 while ($arr = mysql_fetch_array($result)) {

  
echo("<tr><td><a href='searchpay.php?id1=$arr[0]' title='Show Payments Details'>$arr[0]</td><td><a href='searchpay.php?id1=$arr[0]' title='Show Payments Details'>$arr[1]</td><td>$arr[2]</td><td> $arr[3]</td></tr>");

 }

echo("<tr><td colspan=2>Total Payments</td><td bgcolor=red><b>".number_format($arr1[0])."</b></td><td bgcolor=cyan><b>$arr1[1]</td></tr>");
echo("</table>");


echo($num." Students Payments Total Found");
echo("<br>");
echo("<a href=allpayments.php>show all Payment</a>");
echo("<br>");
echo("<a href=form2.html>Add New Payment</a>");


 ?>

</body>
</html>